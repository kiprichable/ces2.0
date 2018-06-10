
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
        <h1 class="page-header lead">Home</h1>
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
                                <div class="col-lg-4 margin-bottom-30">
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption caption-green">
                                                <i class="fa fa-info-circle"></i>
                                                <span class="caption-subject text-uppercase">{{$content->title}}</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="actions">
                                                @if(Auth::user())
                                                <a href="{{url('home/'.$content->id.'/edit')}}" class="btn">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                                @endif
                                            </div>
                                            <span class="caption-helper">{{$content->created_at}}</span>
                                            <p>{{$content->content}}</p>
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
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

                            <div id='calendar'>

                            </div>
                            @include('events.modals._createModal')
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
                    @if(Auth::user())
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li>
                                <a href="{{url('admin/statistics')}}">
                                    <i class="fa fa-edit fa-fw"></i> Edit Stats/Data
                                </a>
                            </li>
                        </ul>
                    </div>
                   @endif
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($statistics as $statistic)
                            <div id="menu">
                                <a href="{{url('data/'.$content->id.'/edit')}}" class="pull-right"><span class="fa fa-edit "></span></a>
                                <div class="panel list-group">
                                    <a href="#" class="list-group-item" data-toggle="collapse" data-target="#{{$statistic->id}}" data-parent="#menu">{{$statistic->title}}
                                        <span class="fa fa-folder-open pull-right">
                                            <a href="{{url('data/'.$statistic->id.'/edit')}}"></a>
                                        </span>
                                    </a>
                                    <div id="{{$statistic->id}}" class="sublinks collapse">
                                        <blockquote>
                                        {!!  $statistic->content !!}
                                        </blockquote>


                                    </div>
                                </div>
                            </div>

                        @endforeach

                        <a href="http://hmismn.org/" class="list-group-item" target="_blank">
                            <i class="fa fa-info fa-fw"></i> MN Homeless Management Information System (HMIS)
                            <span class="pull-right text-muted small">
                                    </span>
                        </a>
                            <a href="http://www.wilder.org/Wilder-Research/Research-Areas/Homelessness/Pages/default.aspx" class="list-group-item" target="_blank">
                                <i class="fa fa-info fa-fw"></i> Wilder Foundation Research
                                <span class="pull-right text-muted small">
                                    </span>
                            </a>
                        <a href="http://www.endhomelessness.org/library/entry/the-state-of-homelessness-in-america-2015" class="list-group-item" target="_blank">
                                <i class="fa fa-info fa-fw"></i> National Alliance to End Homelessness
                                <span class="pull-right text-muted small">
                                    </span>
                            </a>
                        <a href="http://www.greendoors.org/facts/general-data.php" class="list-group-item" target="_blank">
                                <i class="fa fa-info fa-fw"></i> Greendoors Homelessness
                                <span class="pull-right text-muted small">
                                    </span>
                            </a>
                         <a href="http://frontsteps.org/u-s-homelessness-facts/" class="list-group-item" target="_blank">
                                <i class="fa fa-info fa-fw"></i> Frontsteps Homelessness
                                <span class="pull-right text-muted small">
                                    </span>
                            </a>

                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<div id="morris-donut-chart"></div>--}}
                    {{--<a href="#" class="btn btn-default btn-block">View Details</a>--}}
                {{--</div>--}}
                {{--<!-- /.panel-body -->--}}
            {{--</div>--}}
            {{--<!-- /.panel -->--}}
            {{--<div class="chat-panel panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<i class="fa fa-comments fa-fw"></i> Chat--}}
                    {{--<div class="btn-group pull-right">--}}
                        {{--<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-chevron-down"></i>--}}
                        {{--</button>--}}
                        {{--<ul class="dropdown-menu slidedown">--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<i class="fa fa-refresh fa-fw"></i> Refresh--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<i class="fa fa-check-circle fa-fw"></i> Available--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<i class="fa fa-times fa-fw"></i> Busy--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<i class="fa fa-clock-o fa-fw"></i> Away--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="divider"></li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<i class="fa fa-sign-out fa-fw"></i> Sign Out--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- /.panel-heading -->--}}
                {{--<div class="panel-body">--}}
                    {{--<ul class="chat">--}}
                        {{--<li class="left clearfix">--}}
                                    {{--<span class="chat-img pull-left">--}}
                                        {{--<img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />--}}
                                    {{--</span>--}}
                            {{--<div class="chat-body clearfix">--}}
                                {{--<div class="header">--}}
                                    {{--<strong class="primary-font">Jack Sparrow</strong>--}}
                                    {{--<small class="pull-right text-muted">--}}
                                        {{--<i class="fa fa-clock-o fa-fw"></i> 12 mins ago--}}
                                    {{--</small>--}}
                                {{--</div>--}}
                                {{--<p>--}}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="right clearfix">--}}
                                    {{--<span class="chat-img pull-right">--}}
                                        {{--<img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />--}}
                                    {{--</span>--}}
                            {{--<div class="chat-body clearfix">--}}
                                {{--<div class="header">--}}
                                    {{--<small class=" text-muted">--}}
                                        {{--<i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>--}}
                                    {{--<strong class="pull-right primary-font">Bhaumik Patel</strong>--}}
                                {{--</div>--}}
                                {{--<p>--}}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="left clearfix">--}}
                                    {{--<span class="chat-img pull-left">--}}
                                        {{--<img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />--}}
                                    {{--</span>--}}
                            {{--<div class="chat-body clearfix">--}}
                                {{--<div class="header">--}}
                                    {{--<strong class="primary-font">Jack Sparrow</strong>--}}
                                    {{--<small class="pull-right text-muted">--}}
                                        {{--<i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>--}}
                                {{--</div>--}}
                                {{--<p>--}}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="right clearfix">--}}
                                    {{--<span class="chat-img pull-right">--}}
                                        {{--<img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />--}}
                                    {{--</span>--}}
                            {{--<div class="chat-body clearfix">--}}
                                {{--<div class="header">--}}
                                    {{--<small class=" text-muted">--}}
                                        {{--<i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>--}}
                                    {{--<strong class="pull-right primary-font">Bhaumik Patel</strong>--}}
                                {{--</div>--}}
                                {{--<p>--}}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<!-- /.panel-body -->--}}
                {{--<div class="panel-footer">--}}
                    {{--<div class="input-group">--}}
                        {{--<input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />--}}
                        {{--<span class="input-group-btn">--}}
                                    {{--<button class="btn btn-warning btn-sm" id="btn-chat">--}}
                                        {{--Send--}}
                                    {{--</button>--}}
                                {{--</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- /.panel-footer -->--}}
            {{--</div>--}}
            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
</div>
    @section('javascript')
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
        <script src="{{URL::Asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace( 'editor' );
        </script>

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
                    @if(Auth::user())
                    editable: true,
                    selectable: true,
                    @endif
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
                            @foreach($events as $event)
                        {
                            title : '{{$event->title}} - {{$event->details}} - {{$event->location}}',
                            start : '{{$event->start_time}}',
                            end : '{{$event->finish_time}}',
                            url : '{{ url('admin/events/'.$event->id.'/edit') }}'
                        },
                        @endforeach
                    ]
                })
            });
        </script>
    @endsection

@stop