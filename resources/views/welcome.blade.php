@extends('layouts.master')

@section('content')
    <div id="page-wrapper" style="margin-top: 5%">
        <div class="row">
            <div class="col-lg-12" style="background-color: #4db3a2">
                <h2  class="lead page-header">Case Managers Available.</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row" style="margin-top: 2%">

            <hr />
            <h3>Case Managers.</h3>
            <hr />

            <table class="table table-condensed table-bordered" id="myTable">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($availability as $available)
                    <tr>
                        <td>{{$available->first_name}}</td>
                        <td>{{$available->last_name}}</td>
                        <td><a href="{{'availability/'.$available->id}}" class="btn btn-xs btn-primary"><i class="fa fa-street-view"></i> View Availability</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>


            <script>
                $(document).ready(function() {
                    $('#myTable').DataTable();
                } );
            </script>

            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

            @foreach(\App\Employee::all() as $employee)
                <div id='{{$employee->id}}'>

                </div>
            @endforeach
        </div>
        </div>

@stop