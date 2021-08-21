<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

// Models
use App\Models\Hotel;
use App\Models\HotelsDetail;
use App\Models\HotelsCertificate;

class HotelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $photos = [];
        if($request->photos){
            foreach ($request->photos as $photo) {
                $url_photo = $this->save_image($photo, 'hotels');
                if($url_photo){
                    array_push($photos, $url_photo);
                }
            }
        }
        try{
            Hotel::create([
                'hotels_type_id' => $request->hotels_type_id,
                'hotels_category_id' => $request->hotels_category_id,
                'hotels_group_id' => $request->hotels_group_id,
                'city_id' => $request->city_id,
                'user_id' => $request->user_id,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email,
                'location' => $request->location,
                'photos' => json_encode($photos),
                'social' => $request->social,
                'owner' => $request->owner
            ]);
            return redirect()->route($request->redirect ?? 'hotels.index')->with(['message' => 'Hotel registrado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->route($request->redirect ?? 'hotels.index')->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $hotel = Hotel::findOrFail($id);
        $photos = json_decode($hotel->photos);
        if($request->photos){
            foreach ($request->photos as $photo) {
                $url_photo = $this->save_image($photo, 'hotels');
                if($url_photo){
                    array_push($photos, $url_photo);
                }
            }
        }
        try{
            Hotel::where('id', $id)->update([
                'hotels_type_id' => $request->hotels_type_id,
                'hotels_category_id' => $request->hotels_category_id,
                'hotels_group_id' => $request->hotels_group_id,
                'city_id' => $request->city_id,
                'user_id' => $request->user_id,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email,
                'location' => $request->location,
                'photos' => json_encode($photos),
                'social' => $request->social,
                'owner' => $request->owner
            ]);
            return redirect()->route($request->redirect ?? 'hotels.index')->with(['message' => 'Hotel editado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->route($request->redirect ?? 'hotels.index')->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function certificate($id){
        return view('hotels.add-certificates', compact('id'));
    }

    public function certificate_store($id, Request $request){
        try {
            HotelsCertificate::create([
                'hotel_id' => $id,
                'type' => $request->type,
                'code' => $request->code,
                'expiration' => $request->expiration,
                // 'file' => $request->,
                'observations' => $request->observations
            ]);

            return redirect()->route($request->redirect ?? 'hotels.index')->with(['message' => 'Certificado de hotel registrado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->route($request->redirect ?? 'hotels.index')->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }

    public function activities($id){
        $slug = Hotel::where('id', $id)->first()->slug;
        return view('hotels.add-activities', compact('id', 'slug'));
    }

    public function activities_pdf($id, Request $request){
        $date = $request->date;
        $hotel = Hotel::with(['details' => function($q)use($date){
            $q->whereDate('start', $date);
        }, 'details.country'])->where('id', $id)->first();
        $view = view('hotels.pdf-activities', compact('hotel', 'date'));
        //return $view;
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function register_detail($slug, Request $request){
        $hotel = Hotel::with('type')->where('slug', $slug)->where('user_id', Auth::user()->id)->first();
        if($hotel){
            return view('hotels.register-details', compact('slug', 'hotel'));
        }
    }

    public function register_detail_list($id){
        $data = HotelsDetail::with(['country', 'hotel' => function($q){
                    $q->where('user_id', Auth::user()->id);
                }])->where('deleted_at', NULL)->where('hotel_id', $id)->get();

        return
            Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('country', function($row){
                return $row->country->name;
            })
            ->rawColumns(['country'])
            ->make(true);
    }

    public function register_detail_store($slug, Request $request){
        // dd($request);
        try {
            $hotel = Hotel::where('slug', $slug)->first();
            HotelsDetail::create([
                'hotel_id' => $hotel->id,
                'country_id' => $request->country_id,
                'full_name' => $request->full_name,
                'ci' => $request->ci,
                'room_number' => $request->room_number,
                'age' => $request->age,
                'gender' => $request->gender,
                'marital_status' => $request->marital_status,
                'job' => $request->job,
                'start' => $request->start,
                'finish' => $request->finish,
                'reason' => $request->reason
            ]);
            return redirect()->route($request->redirect, ['name' => $slug])->with(['message' => 'Hotel registrado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route($request->redirect, ['name' => $slug])->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }
}
