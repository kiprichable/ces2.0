<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Home;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    public function getEmployeeList()
    {
        $employees = DB::table('employees')
                ->select('first_name','last_name')
                ->join('working_hours','working_hours.employee_id','=','employees.id')
                ->where('working_hours.date','>',date('Y-m-d'))
                ->select('employees.*')
                ->distinct()
                ->get()->toArray();



        return $employees;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = array('Yes' => 'Yes','No' => 'No');

        return view('welcome')
                ->withAppointments(\App\Models\Appointment::all())
                ->withResidences($this->client->lastPlaceOfResidence())
                ->withAvailability($this->getEmployeeList())
                ->withEmployees(Employee::all()->pluck('last_name','id'))
                ->withOptions($options)
                ;
    }
    public function create()
    {
        return view('landing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $home = new Home();
        $home->title = $request->input('title');
        $home->content = $request->input('content');
        $home->updated_by = Auth::user()->email;
        $home->save();


        Session::flash('flash_message','Content created successfully');
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('landing.show')
                ->withHome(Home::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('landing.edit')
                ->withHome(Home::find($id));
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
        $home = Home::find($id);

        $home->title = $request->input('title');
        $home->content = $request->input('content');
        $home->updated_by = Auth::user()->email;

        $home->save();


        Session::flash('flash_message','Home content updated successfully.');

        return redirect('/');
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
