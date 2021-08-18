<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

// Models
use App\Models\Hotel;
use App\Models\HotelsDetail;

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
                'location' => $request->location
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
                'marital_status' => $request->marital_status,
                'job' => $request->job,
                'start' => $request->start,
                'finish' => $request->finish,
                'reason' => $request->reason
            ]);
            return redirect()->route($request->redirect, ['name' => $slug])->with(['message' => 'Hotel registrado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->route($request->redirect, ['name' => $slug])->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }
}
