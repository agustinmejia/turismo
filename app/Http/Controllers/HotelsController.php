<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Str;
use Storage;

// Models
use App\Models\Hotel;
use App\Models\HotelsDetail;
use App\Models\HotelsDocument;
use App\Models\HotelsDetailsNacionality;
use App\Models\Country;
use App\Models\Province;
use App\Models\City;
use App\Models\HotelsDetailsEmpty;

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
        try {
            $hotel = Hotel::findOrFail($id);
            $hotel->slug = $id.'-'.$hotel->slug;
            $hotel->deleted_at = Carbon::now();
            $hotel->save();

            return redirect()->route('voyager.hotels.index')->with(['message' => 'Registro eliminado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->route('voyager.hotels.index')->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }

    public function documents($id){
        return view('hotels.add-documents', compact('id'));
    }

    public function documents_store($id, Request $request){
        try {
            $file = $request->file;
            $url = null;
            if($file){
                $newFileName = Str::random(20).'.'.$file->getClientOriginalExtension();
                $dir = "documents/".date('F').date('Y');
                Storage::makeDirectory($dir);
                Storage::disk('public')->put($dir.'/'.$newFileName, file_get_contents($file));
                $url = $dir.'/'.$newFileName;
            }

            HotelsDocument::create([
                'hotel_id' => $id,
                'hotels_documents_type_id' => $request->hotels_documents_type_id,
                'code' => $request->code,
                'start' => $request->start,
                'expiration' => $request->expiration,
                'file' =>  $url,
                'observations' => $request->observations
            ]);

            return redirect()->route($request->redirect ?? 'hotels.index')->with(['message' => 'Certificado de hotel registrado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->route($request->redirect ?? 'hotels.index')->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }

    public function documents_delete($id, Request $request){
        try {
            HotelsDocument::where('id', $request->id)->update([
                'deleted_at' => Carbon::now()
            ]);

            return redirect()->route('voyager.hotels.show', ['id' => $id])->with(['message' => 'Documento eliminado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->route('voyager.hotels.show', ['id' => $id])->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }

    public function activities($id){
        $hotel = Hotel::with(['details' => function($q){
            $q->where('deleted_at', NULL);
        }])->where('id', $id)->first();
        return view('hotels.add-activities', compact('id', 'hotel'));
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
        $data = HotelsDetail::with(['country', 'nacionality', 'hotel' => function($q){
                    $q->where('user_id', Auth::user()->id);
                }])->where('deleted_at', NULL)->where('hotel_id', $id)->get();

        return
            Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('country', function($row){
                return $row->country->name;
            })
            ->addColumn('actions', function($row){
                $onclick = "onclick='edit(".json_encode($row).")'";
                return '<div class="no-sort no-click bread-actions text-right">
                            <a href="#" '.$onclick.' data-toggle="modal" data-target="#update_activity-modal" title="Editar" class="btn btn-sm btn-info">
                                <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Editar</span>
                            </a>
                            <button title="Anular" class="btn btn-sm btn-danger delete" data-toggle="modal" data-target="#delete_modal" onclick="deleteItem('."'".url("admin/hoteles/registers/delete/".$row->id)."'".')">
                                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Anular</span>
                            </button>
                        </div>';
            })
            ->rawColumns(['country', 'actions'])
            ->make(true);
    }

    public function register_detail_store($id, Request $request){
        // dd($request);
        DB::beginTransaction();
        try {

            if($request->country_id && !is_numeric($request->country_id)){
                $country = Country::create([
                    'name' => $request->country_id
                ]);
                $request->country_id = $country->id;
            }

            $detail = HotelsDetail::create([
                'hotel_id' => $id,
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

            if($request->province_id && !is_numeric($request->province_id)){
                $province = Province::create([
                    'state_id' => $request->state_id,
                    'name' => $request->province_id
                ]);
                $request->province_id = $province->id;
            }

            if($request->city_id && !is_numeric($request->city_id)){
                $city = City::create([
                    'province_id' => $request->province_id,
                    'name' => $request->city_id
                ]);
                $request->city_id = $city->id;
            }

            HotelsDetailsNacionality::create([
                'hotels_detail_id' => $detail->id,
                'state_id' => $request->state_id,
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'origin' => $request->origin
            ]);

            DB::commit();
            return redirect()->route($request->redirect, ['hotel' => $id])->with(['message' => 'Registro de huesped guardado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            // dd($th);
            return redirect()->route($request->redirect, ['hotel' => $id])->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }

    public function register_detail_empty_store($id, Request $request){
        DB::beginTransaction();
        try {

            HotelsDetailsEmpty::create([
                'hotel_id' => $id,
                'user_id' => Auth::user()->id,
                'date' => $request->date,
                'observations' => $request->observations
            ]);

            DB::commit();
            return redirect()->route($request->redirect, ['hotel' => $id])->with(['message' => 'Registro sin movimiento guardado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            // dd($th);
            return redirect()->route($request->redirect, ['hotel' => $id])->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }

    public function register_detail_update($id, Request $request){
        // dd($request);
        DB::beginTransaction();
        try {

            if($request->country_id && !is_numeric($request->country_id)){
                $country = Country::create([
                    'name' => $request->country_id
                ]);
                $request->country_id = $country->id;
            }

            $detail = HotelsDetail::where('id', $request->id)->update([
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

            if($request->province_id && !is_numeric($request->province_id)){
                $province = Province::create([
                    'state_id' => $request->state_id,
                    'name' => $request->province_id
                ]);
                $request->province_id = $province->id;
            }

            if($request->city_id && !is_numeric($request->city_id)){
                $city = City::create([
                    'province_id' => $request->province_id,
                    'name' => $request->city_id
                ]);
                $request->city_id = $city->id;
            }

            HotelsDetailsNacionality::where('hotels_detail_id', $request->id)->update([
                'state_id' => $request->state_id,
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'origin' => $request->origin
            ]);

            DB::commit();
            return redirect()->route($request->redirect, ['hotel' => $id])->with(['message' => 'Registro de huesped editado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect()->route($request->redirect, ['hotel' => $id])->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }

    public function register_detail_delete($id, Request $request){
        DB::beginTransaction();
        try {
            HotelsDetail::where('id', $id)->update([
                'deleted_at' => Carbon::now()
            ]);

            HotelsDetailsNacionality::where('hotels_detail_id', $id)->update([
                'deleted_at' => Carbon::now()
            ]);

            DB::commit();
            return redirect()->route($request->redirect, ['hotel' => $request->hotel_id])->with(['message' => 'Registro de huesped eliminado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect()->route($request->redirect, ['hotel' => $request->hotel_id])->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }
}
