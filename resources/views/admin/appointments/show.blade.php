@extends('layouts.master')

@section('content')
    @include('partials.dashboard')
    <h3 class="page-title">@lang('quickadmin.appointments.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.appointments.fields.client')</th>
                            <td>{{ $appointment->client->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.last-name')</th>
                            <td>{{ isset($appointment->client) ? $appointment->client->last_name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.phone')</th>
                            <td>{{ isset($appointment->client) ? $appointment->client->phone : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.email')</th>
                            <td>{{ isset($appointment->client) ? $appointment->client->email : '' }}</td>
                        </tr>

                        <tr>
                            <th>@lang('quickadmin.clients.fields.age')</th>
                            <td>{{$appointment->client->age }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.city')</th>
                            <td>{{ $appointment->client->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.state')</th>
                            <td>{{ $appointment->client->state }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.family')</th>
                            <td>{{ $appointment->client->additional_family }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.names')</th>
                            <td>{{ $appointment->client->additional_names }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.veteran')</th>
                            <td>{{ $appointment->client->veteran }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.dd214')</th>
                            <td>{{ $appointment->client->dd214 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.residence')</th>
                            <td>{{ $appointment->client->last_night_residence }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointments.fields.employee')</th>
                            <td>{{ $appointment->employee->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.last-name')</th>
                            <td>{{ isset($appointment->employee) ? $appointment->employee->last_name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointments.fields.start-time')</th>
                            <td>{{ $appointment->start_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointments.fields.finish-time')</th>
                            <td>{{ $appointment->finish_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointments.fields.comments')</th>
                            <td>{!! $appointment->comments !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.appointments.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop