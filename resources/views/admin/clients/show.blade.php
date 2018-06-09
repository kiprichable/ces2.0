@extends('layouts.master')

@section('content')
    <div id="page-wrapper" style="margin-top: 5%">
    <div class="row">
        <div class="col-lg-12" style="background-color: #4db3a2">
            <h2  class="lead page-header">@lang('quickadmin.clients.title')</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row" style="margin-top: 2%">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.clients.fields.first-name')</th>
                            <td>{{ $client->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.last-name')</th>
                            <td>{{ $client->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.phone')</th>
                            <td>{{ $client->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.email')</th>
                            <td>{{ $client->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.age')</th>
                            <td>{{ $client->age }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.city')</th>
                            <td>{{ $client->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.state')</th>
                            <td>{{ $client->state }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.family')</th>
                            <td>{{ $client->additional_family }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.names')</th>
                            <td>{{ $client->additional_names }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.veteran')</th>
                            <td>{{ $client->veteran }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.dd214')</th>
                            <td>{{ $client->dd214 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.residence')</th>
                            <td>{{ $client->last_night_residence }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#appointments" aria-controls="appointments" role="tab" data-toggle="tab">Appointments</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="appointments">
<table class="table table-bordered table-striped {{ count($appointments) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.appointments.fields.client')</th>
                        <th>@lang('quickadmin.clients.fields.last-name')</th>
                        <th>@lang('quickadmin.clients.fields.phone')</th>
                        <th>@lang('quickadmin.clients.fields.email')</th>
                        <th>@lang('quickadmin.appointments.fields.employee')</th>
                        <th>@lang('quickadmin.employees.fields.last-name')</th>
                        <th>@lang('quickadmin.appointments.fields.start-time')</th>
                        <th>@lang('quickadmin.appointments.fields.finish-time')</th>
                        <th>@lang('quickadmin.appointments.fields.comments')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($appointments) > 0)
            @foreach ($appointments as $appointment)
                <tr data-entry-id="{{ $appointment->id }}">
                    <td>{{ $appointment->client->first_name or '' }}</td>
<td>{{ isset($appointment->client) ? $appointment->client->last_name : '' }}</td>
<td>{{ isset($appointment->client) ? $appointment->client->phone : '' }}</td>
<td>{{ isset($appointment->client) ? $appointment->client->email : '' }}</td>
                                <td>{{ $appointment->employee->first_name or '' }}</td>
<td>{{ isset($appointment->employee) ? $appointment->employee->last_name : '' }}</td>
                                <td>{{ $appointment->start_time }}</td>
                                <td>{{ $appointment->finish_time }}</td>
                                <td>{!! $appointment->comments !!}</td>
                                <td>
                                    @can('appointment_view')
                                    <a href="{{ route('admin.appointments.show',[$appointment->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('appointment_edit')
                                    <a href="{{ route('admin.appointments.edit',[$appointment->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('appointment_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.appointments.destroy', $appointment->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clients.index') }}" class="btn btn-block btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
    </div>
@stop