
@extends('layouts.master')

@section('content')
<style>

    .margin-bottom-30 {
        margin-bottom: 30px;
    }

    /* Portlet */
    .portlet {
        background: #fff;
        padding: 20px;
    }
    /* Portlet Title */
    .portlet-title {
        padding: 0;
        min-height: 40px;
        border-bottom: 1px solid #eee;
        margin-bottom: 18px;
    }

    .caption {
        float: left;
        display: inline-block;
        font-size: 18px;
        line-height: 18px;
    }
    /* Actions */
    .actions {
        float: right;
        display: inline-block;
    }

    .actions a {
        margin-left: 3px;
    }

    .actions .btn {
        color: #666;
        padding: 3px 9px;
        font-size: 13px;
        line-height: 1.5;
        background-color: #fff;
        border-color: #ccc;
        border-radius: 50px;
    }

    .actions .btn i {
        font-size: 12px;
    }

    .actions .btn:hover {
        background: #f2f2f2;
    }

</style>
<div class="page-wrapper">
    <div class="col-lg-12" style="background-color: #4db3a2">
        <h1 class="page-header ">
            <span class="caption-subject text-uppercase">Home</span>
            <a href="{{url('/')}}"><span class="caption-helper">Homepage</span></a>
        </h1>
    </div>
    <div class="row" style="margin-top: 5%">
        <div class="col-lg-8">
            <div class="panel panel-default" style="margin-top: 2%">
                <div class="panel-body">
                                <!-- BEGIN Portlet PORTLET-->
                                @if($contents->isEmpty())
                                <div class="col-md-4 margin-bottom-30">
                                    <div class="portlet" style="margin-right:0%">
                                        <div class="portlet-title">
                                            <div class="actions">
                                                @if(Auth::user())
                                                    <a href="javascript:;" class="btn">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="caption caption-green">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject text-uppercase">Site Missing Content!.</span>
                                                <span class="caption-helper">goes here..</span>
                                            </div>

                                        </div>
                                        <div class="portlet-body">
                                            <span class="caption-helper">{{Carbon\Carbon::now()}}</span>
                                            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
                                        </div>
                                    </div>
                                    </div>
                                @endif
                                @foreach($contents as $content)
                                <div class="col-lg-6 margin-bottom-30">
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption caption-green">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject text-uppercase">{{$content->title}}</span>
                                                <span class="caption-helper">Read more..</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="actions">
                                                {{--@if(Auth::user())--}}
                                                <a href="{{url('home/'.$content->id.'/edit')}}" class="btn">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                                {{--@endif--}}
                                            </div>
                                            <span class="caption-helper">{{$content->created_at}}</span>
                                            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            @endforeach
                    </div>
            </div>
                <!-- /.panel-body -->
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-calendar-check-o fa-fw"></i> Events
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Action</a>
                                </li>
                                <li><a href="#">Another action</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

                            <div id='calendar'>

                            </div>
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
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                        <div class="col-lg-8">
                            <div id="morris-bar-chart"></div>
                        </div>
                        <!-- /.col-lg-8 (nested) -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
            <div class="panel panel-default" style="margin-top: 2%">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Stats/Data
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($contents as $content)

                            <div id="menu">
                                <a href="{{url('data/'.$content->id.'/edit')}}" class="pull-right"><span class="fa fa-edit "></span></a>
                                <div class="panel list-group">
                                    <a href="#" class="list-group-item" data-toggle="collapse" data-target="#{{$content->id}}" data-parent="#menu">{{$content->title}}
                                        <span class="fa fa-folder-open pull-right">
                                        <a href="{{url('data/'.$content->id.'/edit')}}" class="pull-right"><span class="fa fa-edit "></span></a>
                                        </span>
                                    </a>
                                    <div id="{{$content->id}}" class="sublinks collapse">
                                        <a class="list-group-item small"></span>{{$content->content}}</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                        <a href="http://hmismn.org/" class="list-group-item">
                            <i class="fa fa-info fa-fw"></i> MN Homeless Management Information System (HMIS)
                            <span class="pull-right text-muted small"><em>Open</em>
                                    </span>
                        </a>
                            <a href="http://www.wilder.org/Wilder-Research/Research-Areas/Homelessness/Pages/default.aspx" class="list-group-item">
                                <i class="fa fa-info fa-fw"></i> Wilder Foundation Research
                                <span class="pull-right text-muted small"><em>Open</em>
                                    </span>
                            </a>
                        <a href="http://www.endhomelessness.org/library/entry/the-state-of-homelessness-in-america-2015" class="list-group-item">
                                <i class="fa fa-info fa-fw"></i> National Alliance to End Homelessness
                                <span class="pull-right text-muted small"><em>Open</em>
                                    </span>
                            </a>
                        <a href="http://www.greendoors.org/facts/general-data.php" class="list-group-item">
                                <i class="fa fa-info fa-fw"></i> Greendoors Homelessness
                                <span class="pull-right text-muted small"><em>Open</em>
                                    </span>
                            </a>
                         <a href="http://frontsteps.org/u-s-homelessness-facts/" class="list-group-item">
                                <i class="fa fa-info fa-fw"></i> Frontsteps Homelessness
                                <span class="pull-right text-muted small"><em>Open</em>
                                    </span>
                            </a>

                    </div>
                    <!-- /.list-group -->
                    <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart"></div>
                    <a href="#" class="btn btn-default btn-block">View Details</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
            <div class="chat-panel panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-comments fa-fw"></i> Chat
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li>
                                <a href="#">
                                    <i class="fa fa-refresh fa-fw"></i> Refresh
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-check-circle fa-fw"></i> Available
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-times fa-fw"></i> Busy
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-clock-o fa-fw"></i> Away
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <ul class="chat">
                        <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong>
                                    <small class="pull-right text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                    </small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong>
                                    <small class="pull-right text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.panel-body -->
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                    </div>
                </div>
                <!-- /.panel-footer -->
            </div>
            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
</div>
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
                        //dow: [2,4], // Monday - Thursday

                        start: '09:00', // a start time (9am in this example)
                        end: '17:00', // an end time (6pm in this example)

                    },
                    //hiddenDays: [ 1, 3, 5 ],

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
                            @foreach($workinghours as $hour)
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

@stop