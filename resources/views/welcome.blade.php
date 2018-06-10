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

            <table id="employee-list" class="table table-striped table-bordered" cellspacing="0" width="100%">

            </table>

            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

            @foreach(\App\Employee::all() as $employee)
                <div id='{{$employee->id}}'>

                </div>
            @endforeach

            <script>
                $(function() {
                    $('#employee-list').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ url('employees-list') }}',
                        columns: [
                            { data: 'first_name', name: 'first_name' },
                            { data: 'last_name', name: 'last_name' },
                            {data: 'action', name: 'action', orderable: false, searchable: false}

                        ]
                    });
                });
            </script>
        </div>
        </div>

@stop