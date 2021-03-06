@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="col-lg-12">
            <h1 class="page-header ">
            </h1>
        </div>
        <h3 class="page-title lead"> Create Statistics</h3>
        <hr>

        {!! Form::open(['method' => 'POST', 'url' => 'admin/statistics']) !!}

        <div class="row">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                        {!! Form::text('title',old('title'), ['class' => 'form-control', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('title'))
                            <p class="help-block">
                                {{ $errors->first('title') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('content', 'content', ['class' => 'control-label']) !!}
                        {!! Form::textarea('content',old('content'), ['class' => 'form-control', 'required' => '','id' =>'editor']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('content'))
                            <p class="help-block">
                                {{ $errors->first('content') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'col-lg-12 btn btn-danger']) !!}
    {!! Form::close() !!}
    <script src="{{URL::Asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@stop
