<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="page-title">Create Event</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="well">
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/events']) !!}
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    {!! Form::label('title', 'Event title *', ['class' => 'control-label']) !!}
                                    <input name="title" id="title" value="{{ old('title') }}" class="form-control" required>
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
                                    {!! Form::label('details', 'Event details *', ['class' => 'control-label']) !!}
                                    <input name="details" id="details" value="{{ old('details') }}" class="form-control" required>
                                    <p class="help-block"></p>
                                    @if($errors->has('details'))
                                        <p class="help-block">
                                            {{ $errors->first('details') }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    {!! Form::label('location', 'Event location *', ['class' => 'control-label']) !!}
                                    <input name="location" id="location" value="{{ old('location') }}" class="form-control">
                                    <p class="help-block"></p>
                                    @if($errors->has('location'))
                                        <p class="help-block">
                                            {{ $errors->first('location') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    {!! Form::label('date', 'Date*', ['class' => 'control-label']) !!}
                                    {!! Form::text('date', old('date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '','id' => 'date']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('date'))
                                        <p class="help-block">
                                            {{ $errors->first('date') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    {!! Form::label('start_time', 'Start time*', ['class' => 'control-label']) !!}
                                    {!! Form::text('start_time', old('start_time'), ['class' => 'form-control timepicker', 'placeholder' => '', 'required' => '','id' => 'start']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('start_time'))
                                        <p class="help-block">
                                            {{ $errors->first('start_time') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    {!! Form::label('finish_time', 'Finish time', ['class' => 'control-label']) !!}
                                    {!! Form::text('finish_time', old('finish_time'), ['class' => 'form-control timepicker', 'placeholder' => '','id' => 'end']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('finish_time'))
                                        <p class="help-block">
                                            {{ $errors->first('finish_time') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger col-lg-12']) !!}
                        </div>
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
    <!-- /.table-responsive -->
</div>