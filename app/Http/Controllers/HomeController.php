<?php

namespace App\Http\Controllers;

use App\Client;
use App\Employee;
use App\Home;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
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
                ->where('working_hours.date','>=',date('Y-m-d'))
                ->select('employees.*')
                ->distinct()
                ->get()->toArray();



        return DataTables::of($employees)
                ->addColumn('action', function ($employees) {
                    return '<a href="availability/'.$employees->id.'" class="btn btn-xs btn-primary"><i class="fa fa-street-view"></i> View Availability</a>';
                })
                ->make(true);
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
                ->withAppointments(\App\Appointment::all())
                ->withResidences($this->client->lastPlaceOfResidence())
                ->withEmployees(Employee::all()->pluck('last_name','id'))
                ->withOptions($options)
                ;
    }
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
        $home = new Home();
        $home->title = $request->input('title');
        $home->content = $request->input('content');
        $home->updated_by = Auth::user()->email;
        $home->save();

        Session::flash('Content created successfully');
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

        return redirect('/')->with('flash_success','Home content updated successfully.');
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
