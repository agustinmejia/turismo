<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use \App\Models\Hotel;
use \App\Models\Country;
use \App\Models\State;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function register_activities(){
        return view('reports.register-activities');
    }

    public function register_activities_list(Request $request){
        $date = $request->date;
        $activities = Hotel::with(['type', 'category', 'city.province.state', 'details' => function($q)use($date){
                $q->whereDate('start', $date)->where('deleted_at', NULL);
            }, 'details_empties' => function($q)use($date){
                $q->whereDate('date', $date)->where('deleted_at', NULL);
            }])
            // ->whereHas('details', function($q)use($date){
            //     $q->whereDate('start', $date)->where('deleted_at', NULL);
            // })
            ->where('deleted_at', NULL)->get();
        // dd($activities);
        return view('reports.register-activities-list', compact('activities'));
    }

    public function national_activities(){
        $hotels =  Hotel::with(['type', 'category'])->where('deleted_at', NULL)->get();
        return view('reports.national-activities', compact('hotels'));
    }

    public function national_activities_list(Request $request){
        $date = $request->year.'-'.$request->month;
        $states = State::with(['registers.detail'])
            ->where('deleted_at', NULL)->get();
        // dd($states);
        return view('reports.national-activities-list', compact('states', 'date'));
    }

    public function international_activities(){
        $hotels =  Hotel::with(['type', 'category'])->where('deleted_at', NULL)->get();
        return view('reports.international-activities', compact('hotels'));
    }

    public function international_activities_list(Request $request){
        $date = $request->year.'-'.$request->month;
        $countries = Country::with(['detail'])
            ->where('deleted_at', NULL)->get();
        // dd($countries);
        return view('reports.international-activities-list', compact('countries', 'date'));
    }
}
