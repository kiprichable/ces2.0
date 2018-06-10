@extends('layouts.master')

@section('content')
    <div id="page-wrapper" style="margin-top: 5%">
        <div class="row">
            <div class="col-lg-12" style="background-color: #4db3a2">
                <h2  class="lead page-header">@lang('quickadmin.working-hours.title')</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        @can('working_hour_create')
            <div class="pull-right" style="margin: 1%">
                <a href="{{route('admin.working_hours.create')}}" class="btn btn-block btn-primary">
                    <span class="fa fa-plus"> Add</span>
                </a>
            </div>
        @endcan

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <div id='calendar' style="margin-top: 5%"></div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="page-title">@lang('quickadmin.working-hours.title')</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="well">
                                {!! Form::open(['method' => 'POST', 'route' => ['admin.working_hours.store']]) !!}
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                    {!! Form::label('employee_id', 'Employee*', ['class' => 'control-label']) !!}
                                    <select name="employee_id" id="employee_id" value="{{ old('employee_id') }}" class="form-control" required>
                                        <option value="">Please select</option>
                                        @foreach($employees as $employee)
                                            @if(Auth::user()->role()->first()['title'] != 'Administrator')
                                                @if(Auth::user()->email ==$employee->email)
                                                <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                                @endif
                                            @else
                                            <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <p class="help-block"></p>
                                    @if($errors->has('employee_id'))
                                        <p class="help-block">
                                            {{ $errors->first('employee_id') }}
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
    </div>

@stop

@section('javascript')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                // put your options and callbacks here
                defaultView: 'agendaWeek',
                timeFormat: 'h(:mm)',
                minTime: '09:00:00',
                maxTime: '17:00:00',
                height: 500,
                header:
                    {
                        left: 'prev,next,today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                businessHours: {
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    dow: [2,4], // Monday - Thursday

                    start: '09:00', // a start time (9am in this example)
                    end: '17:00', // an end time (6pm in this example)

                },
                hiddenDays: [ 1, 3, 5 ],

                weekends: false,
                editable: true,
                selectable: true,

                //When u select some space in the calendar do the following:
                select: function (start, end, allDay) {

                    //alert('event selected');
                    //do something when space selected
                    //Show 'add event' modal
                    $('#myModal').modal('show');

                    $( "#date" ).val(moment(start).format('YYYY-MM-DD'));
                    $( "#start" ).val(moment(start).format('HH:mm:ss'));
                    $( "#end" ).val(moment(end).format('HH:mm:ss'));

                },
                events : [
                    @foreach($working_hours as $hour)
                    {
                        title : '{{ $hour->employee->first_name . ' ' . $hour->employee->last_name }}',
                        start : '{{ $hour->date . ' ' . $hour->start_time }}',
                        end : '{{ $hour->date . ' ' . $hour->finish_time }}',
                        url : '{{ route('admin.working_hours.edit', $hour->id) }}'
                    },
                    @endforeach
                ]
            })
        });
    </script>
@endsection