@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="col-lg-12">
            <h1 class="page-header ">
            </h1>
        </div>
        <h3 class="page-title lead"> Edit Contact: {{$contact->title}}</h3>
        <hr>

        {!! Form::open(['url' => 'admin/contacts/'.$contact->id, 'method' => 'PATCH']) !!}
        <div class="row">
            <div class="panel-body">
                <div class="col-lg-6 form-group">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title',$contact->title, ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="col-lg-6 form-group">
                    {!! Form::label('phone', 'phone', ['class' => 'control-label']) !!}
                    {!! Form::text('phone',$contact->phone, ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                </div>

                <div class="col-lg-6 form-group">
                    {!! Form::label('email', 'email', ['class' => 'control-label']) !!}
                    {!! Form::text('email',$contact->email, ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>

                <div class="col-lg-6 form-group">
                    {!! Form::label('address', 'address', ['class' => 'control-label']) !!}
                    {!! Form::text('address',$contact->address, ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('address'))
                        <p class="help-block">
                            {{ $errors->first('address') }}
                        </p>
                    @endif
                </div>

                <div class="col-lg-6 form-group">
                    {!! Form::label('city', 'city', ['class' => 'control-label']) !!}
                    {!! Form::text('city',$contact->city, ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('city'))
                        <p class="help-block">
                            {{ $errors->first('city') }}
                        </p>
                    @endif
                </div>

                <div class="col-lg-6 form-group">
                    {!! Form::label('state', 'state', ['class' => 'control-label']) !!}
                    {!! Form::text('state',$contact->state, ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('state'))
                        <p class="help-block">
                            {{ $errors->first('state') }}
                        </p>
                    @endif
                </div>

                <div class="col-lg-6 form-group">
                    {!! Form::label('zip', 'zip', ['class' => 'control-label']) !!}
                    {!! Form::text('zip',$contact->zip, ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('zip'))
                        <p class="help-block">
                            {{ $errors->first('zip') }}
                        </p>
                    @endif
                </div>

                <div class="col-lg-6 form-group">
                    {!! Form::label('country', 'country', ['class' => 'control-label']) !!}
                    {!! Form::text('country',$contact->country, ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('country'))
                        <p class="help-block">
                            {{ $errors->first('country') }}
                        </p>
                    @endif
                </div>

    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'col-lg-12 btn btn-danger']) !!}
    {!! Form::close() !!}
    <script src="{{URL::Asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@stop
