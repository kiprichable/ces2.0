<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.index')
                ->withEvents(Event::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create')
                ->withEvents();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData =
                [
                        'title' => $request->input('title'),
                        "details" => $request->input('details'),
                        "location" => $request->input('location'),
                        "date" => $request->input('date'),
                        "start_time" => $request->input('date').' '.$request->input('start_time'),
                        "finish_time" => $request->input('date').' '.$request->input('finish_time'),
                        "created_by" => Auth::user()->email
                ];

       Event::create($requestData);


        Session::flash('flash_message','Event created successfully.');

       return redirect('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('events.show')
                ->withEvents();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('events.edit')
                ->withEvent(Event::find($id));
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
        $requestData =
                [
                        'title' => $request->input('title'),
                        "details" => $request->input('details'),
                        "location" => $request->input('location'),
                        "date" => $request->input('date'),
                        "start_time" => $request->input('date').' '.$request->input('start_time'),
                        "finish_time" => $request->input('date').' '.$request->input('finish_time'),
                        "updated_by" => Auth::user()->email
                ];

        Event::find($id)->update($requestData);

        Session::flash('flash_message','Event updated successfully.');

        return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();

        Session::flash('flash_message','Event deleted successfully.');

        return redirect('events');


    }
}
