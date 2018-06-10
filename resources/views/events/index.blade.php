@extends('layouts.master')

@section('content')
    <div id="page-wrapper" style="margin-top: 5%">
        <div class="row">
            <div class="col-lg-12" style="background-color: #4db3a2">
                <h2  class="lead page-header">Schedule Events.</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row" style="margin-top: 2%">
                <div class="alert alert-info">
                    @if(Auth::user())
                        <h4 class="lead">Events instructions</h4>
                        To create/add an event click on the calendar and </strong> select a time that you would like to schedule an event.
                    @else
                        <h4 class="lead">Events Calendar</h4>

                    @endif

                </div>
                <hr />
        </div>

        @include('events.modals._createModal')

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

        <div id='calendar'>
            @if(Auth::user())
            <div class="row">
                <div class="alert alert-warning">
                    <h4 class="lead">All upcoming events</h4>
                    @if(Auth::user())
                    You can Edit and delete events from the list below.
                    @endif
                </div>
                <hr />
            </div>
        <div class="row">
            <table class="table table-condensed table-bordered" id="myTable">
                <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Event Details</th>
                    <th>Event Location</th>
                    <th>Date</th>
                    <th>Time</th>
                    @if(Auth::user())
                    <th>Action</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{$event->title}}</td>
                        <td>{{$event->details}}</td>
                        <td>{{$event->location}}</td>
                        <td>{{$event->date}}</td>
                        <td>{{substr($event->start_time,11,8).'-'. substr($event->finish_time,11,8)}}</td>
                        @if(Auth::user())
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal{{$event->id}}">
                                <span class="fa fa-edit"> Edit</span>
                            </button>
                            <button class="btn btn-danger" id="delete{{$event->id}}">
                                <span class="fa fa-trash"> Delete</span>
                            </button>

                            {!! Form::open(['method' => 'DELETE', 'url' => 'admin/events/'.$event->id,'id' => $event->id]) !!}
                            {{Form::close()}}

                        </td>

                            @endif
                    </tr>
                    <script>
                        $(document).ready(function()
                        {
                            $('{{'#delete'.$event->id}}').click(function () {
                                var r = confirm("Are you sure you want to delete this event");
                                if (r == true) {
                                    $('{{'#'.$event->id}}').submit();
                                } else {

                                }
                            })

                        } );
                    </script>
                    @include('events.modals._editModal');
                @endforeach

                </tbody>
            </table>
        </div>
                @endif
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        } );
    </script>
@endsection

@stop