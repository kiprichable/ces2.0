<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Employee;
use App\Http\Requests\Availability\AvailabilityRequestPost;
use App\WorkingHour;
use App\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Client;
use Illuminate\Support\Facades\Session;

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
        return view('availability.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AvailabilityRequestPost $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('availability.index')
                ->withEmployee(Employee::find($id))
                ->withAvailability(Employee::find($id)->availability()->whereNull('booked_at')->get());

    }

    function _group_by($array)
    {
        $return = array();

        foreach ($array as $key => $val) {
            $return[substr($key, 0, -1)][] = $val;
        }
        return $return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('availability/create')
                ->withEmployee(Employee::find(Availability::find($id)->employee_id))
                ->withResidences($this->client->lastPlaceOfResidence())
                ->withOptions(['Yes' => 'Yes', 'No' => 'No'])
                ->withDate(Availability::find($id)->start_time)
                ->withStart(Availability::find($id)->start_time)
                ->withAvailability(Availability::find($id))
                ->withEnd(Availability::find($id)->finish_time);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //create client
        $clientData = [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'additional_family' => $request->input('additional_family'),
                'additional_names' => $request->input('additional_names'),
                'age' => $request->input('age'),
                'veteran' => $request->input('veteran'),
                'dd214' => $request->input('dd214'),
                'last_night_residence' => $request->input('last_night_residence')
        ];

        if($Availability = Availability::find($id)->whereNull('booked_at')->first())
        {
            //mark availability as booked
            $Availability->booked_at = Carbon::now();
            $Availability->save();

            //create client
            $client = Client::create($clientData);

            //create appointment
            $appointment = new Appointment;
            $appointment->client_id = $client->id;
            $appointment->employee_id = $Availability->employee_id;
            $appointment->start_time = $request->input('start_time');
            $appointment->finish_time = $request->input('end_time');
            $appointment->comments = $request->input('comments');
            $appointment->save();

        }

        Session::flash('flash_message','Appointment created successfully.');


        return redirect()->to('/');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
