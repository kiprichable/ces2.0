@extends('layouts.master')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2  class="lead page-header">Available Appointment Slots for {{$employee->first_name . ' '. $employee->last_name}}.</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>


        @if(empty($availability))
            <div class="alert alert-danger">
                <h4>{{$employee->first_name . ' '. $employee->last_name}} has 0 availability</h4>
                If you need urgent help, please call our 211 help line or contact St. Louis County Office.
            </div>
            <hr />
        @else
            <div class="alert alert-warning">
                <h4>Appointment instructions</h4>
                To make an appointment with <strong>{{$employee->first_name . ' '. $employee->last_name}}</strong> select a time slot that works for you and click book.
            </div>
            <hr />
        <div class="row">
        <table class="table table-condensed table-bordered" id="myTable">
            <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Book</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($availability as $key => $hours)
                <tr>
                    <td class="success"><h4>{{$key}}</h4></td>
                    <td class="lead success">{{date('l',strtotime($key))}}</td>
                    <td class="success"></td>
                @foreach($hours as $hour)
                    <tr>
                        <td class=""></td>
                        <td class="lead">{{$hour}}</td>
                        <td class="agenda-events">
                            <div class="agenda-event">
                                {{Form::open(['url' => 'availability/'.$employee->id ,'method' => 'PATCH'])}}
                                <input type="text" name="date" value="{{$key}}" hidden>
                                <input type="text" name="time" value="{{$hour}}" hidden>
                                <button class="btn-block btn-info col-lg-6">Book</button>
                                {{Form::close()}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tr>
                    @endforeach
                    </tr>
            </tbody>
        </table>
        </table>
    </div>
        @endif
    </div>
    </div>
@stop
