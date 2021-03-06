<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('statistics.index')
                ->withStatistics(Statistic::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statistics.create');
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
                'content' => $request->input('content'),
                'updated_by' => Auth::user()->email,
                ];

        Statistic::create($requestData);

        Session::flash('flash_message','Statistics created successfully.');

        return redirect('statistics');
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
        return view('statistics.edit')
                ->withStatistic(Statistic::find($id));

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
                        'content' => $request->input('content'),
                        'updated_by' => Auth::user()->email,
                ];

        Statistic::find($id)->update($requestData);

        Session::flash('flash_message','Statistics updated successfully.');

        return redirect('statistics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Statistic::find($id)->delete();

        Session::flash('flash_message','Statistics deleted successfully.');

        return redirect('admin/statistics');
    }
}
