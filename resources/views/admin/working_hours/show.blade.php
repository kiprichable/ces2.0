@extends('layouts.master')

@section('content')
    <div id="page-wrapper" style="margin-top: 5%">
        <div class="row">
            <div class="col-lg-12" style="background-color: #4db3a2">
                <h2  class="lead page-header">@lang('quickadmin.working-hours.title')</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>

    <div class="panel panel-default" style="margin-top: 2%">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.working-hours.fields.employee')</th>
                            <td>{{ $working_hour->employee->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.last-name')</th>
                            <td>{{ isset($working_hour->employee) ? $working_hour->employee->last_name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-hours.fields.date')</th>
                            <td>{{ $working_hour->date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-hours.fields.start-time')</th>
                            <td>{{ $working_hour->start_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-hours.fields.finish-time')</th>
                            <td>{{ $working_hour->finish_time }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.working_hours.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop