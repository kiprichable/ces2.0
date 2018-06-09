@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="col-lg-12">
            <h1 class="page-header ">
            </h1>
        </div>
        <h3 class="page-title lead"> {{$home->title}}</h3>
        <hr>
        <div class="panel panel-default">
            <div class="panel-body">{{$home->content}}</div>
        </div>
    </div>

@stop