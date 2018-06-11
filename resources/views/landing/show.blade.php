@extends('layouts.master')

@section('content')
    <div class="col-lg-12" style="background-color: #4db3a2">
        <h1 class="page-header lead">{{$home->title}}</h1>
    </div>
    <div class="row" style="margin-top: 5%">
            <h1 class="page-header ">
            </h1>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">{!!$home->content!!}</div>
        </div>
    </div>

@stop