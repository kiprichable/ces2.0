@extends('layouts.master')

@section('content')
    <div id="page-wrapper" style="margin-top: 5%">
        <div class="row">
            <div class="col-lg-12" style="background-color: #4db3a2">
                <h2  class="lead page-header">@lang('quickadmin.clients.title')</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>

    {!! Form::open(['method' => 'POST', 'route' => ['admin.clients.store']]) !!}

    <div class="panel panel-default" style="margin-top: 2%">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        @include('admin.clients.forms._formcreate')
    </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-block btn-danger']) !!}
    {!! Form::close() !!}
@stop

