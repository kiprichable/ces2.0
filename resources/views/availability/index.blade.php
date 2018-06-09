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
                <th>Start</th>
                <th>End</th>
                <th>Book</th>
            </tr>
            </thead>
            <tbody>
            @foreach($availability as $hours)
                <tr>
                    <td>{{substr($hours->start_time,0,10)}}</td>
                    <td>{{substr($hours->start_time,11,8)}}</td>
                    <td>{{substr($hours->finish_time,11,8)}}</td>
                    <td><a href="{{$hours->id.'/edit'}}" class="btn btn-primary">
                            <span>Book</span>
                        </a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
        @endif
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        } );
    </script>
@stop
