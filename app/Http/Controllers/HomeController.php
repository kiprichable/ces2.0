<?php

namespace App\Http\Controllers;

use App\Client;
use App\Employee;
use App\Http\Requests;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
        $employees = Employee::all();
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
}
