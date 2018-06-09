@extends('layouts.master')

@section('content')
    <div id="page-wrapper" style="margin-top: 5%">
        <div class="row">
            <div class="col-lg-12" style="background-color: #4db3a2">
                <h2 class="lead page-header">Create appointment with {{$employee->first_name . ' '. $employee->last_name}}.</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row" style="margin-top: 2%">
            <div class="col-lg-12">
                <div class="well">
                    {!! Form::open(['method' => 'PATCH', 'url' => 'availability/'.$availability->id]) !!}
                    <div class="form-group">
                        {!! Form::hidden('employee_id',$employee->id, ['class' => 'form-control', 'placeholder' => 'Select Case manager', 'hidden' =>'true']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('employee_id'))
                            <p class="help-block">
                                {{ $errors->first('employee_id') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="start time" class="control-label">Start time</label>
                        <input type="text" class="form-control" id="start" name="start_time" value="{{$start}}"
                               required="" title="Selected time" placeholder="{{\Carbon\Carbon::now()}} " readonly>
                        <span class="help-block"></span>
                        @if($errors->has('start_time'))
                            <p class="help-block">
                                {{ $errors->first('start_time') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="end time" class="control-label">End time</label>
                        <input type="text" class="form-control" id="end" name="end_time" value="{{$end}}" required=""
                               title="Selected time" placeholder="{{\Carbon\Carbon::now()}}" readonly>
                        <p class="help-block"></p>
                        @if($errors->has('finish_time'))
                            <p class="help-block">
                                {{ $errors->first('finish_time') }}
                            </p>
                        @endif
                    </div>
                    @include('admin.clients.forms._formcreate')

                    <div class="form-group">
                        <label for="comments" class="control-label">comments</label>
                        <input type="textarea" class="form-control" id="comments" name="comments" value="">
                        <p class="help-block"></p>
                        @if($errors->has('comments'))
                            <p class="help-block">
                                {{ $errors->first('comments') }}
                            </p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
