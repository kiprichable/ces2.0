<?php

namespace App\Http\Controllers;

use App\Employee;
use App\WorkingHour;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Client;

class AvailabilityController extends Controller
{
    protected $client;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        // $this->middleware('auth');
        $this->client = $client;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $d = strtotime('+'.'2'.' weeks', strtotime(date('Y-m-d')));
        //dd(date('Y-m-d',$d));

        $employee = Employee::find($id);
        $availability = array();
        $working_hours = $employee->working_hours()
                ->whereDate('date','>= ',date('Y-m-d'))
                ->whereDate('date','<=',date('Y-m-d', $d))
                ->orderBy('start_time')->get();

        foreach($working_hours as $hours)
        {
            $start_date = strtotime(Carbon::parse($hours->date.' '.$hours->start_time));
            $end_date = strtotime(Carbon::parse($hours->date.' '.$hours->finish_time));
            $available = ($end_date - $start_date)/3600;

            for($h = 0; $h < $available; $h++)
            {
                $availability[$hours->date.$h] = Carbon::parse($hours->start_time)->addHours($h)->format('H:i:s') .' - '. Carbon::parse($hours->start_time)->addHours($h + 1)->format('H:i:s');
            }

        }

        return view('availability.index')
                ->withEmployee(Employee::find($id))
                ->withAvailability($this->_group_by($availability));


    }
    function _group_by($array) {
        $return = array();

        foreach($array as $key => $val) {
            $return[substr($key,0,-1)][] = $val;
        }
        return $return;
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

        return view('availability.create')
                ->withEmployee(Employee::find($id))
                ->withResidences($this->client->lastPlaceOfResidence())
                ->withOptions(['Yes' => 'Yes','No' => 'No'])
                ->withDate($request->input('date'))
                ->withStart(substr($request->input('time'),0,8))
                ->withEnd(substr($request->input('time'),11,19));
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
}
