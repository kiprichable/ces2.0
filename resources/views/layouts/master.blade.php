<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
       CES
    </title>
    <link href="{{url('/css/app.css')}}" rel="stylesheet">
    <link href="{{url('/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet"
          href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet"
          href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css"/>
    <link rel="stylesheet"
          href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.min.css"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background: #010306; color: #f8f9f0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}">Co-ordinated Entry System</a>
    </div>
    <!-- /.navbar-header -->
    @inject('request', 'Illuminate\Http\Request')
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-calendar-check-o fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="{{url('/admin/appointments/create')}}">
                        <div>
                            <strong>Make an Appointment</strong>
                            <span class="pull-right text-muted">
                                        <em>Pre-screen</em>
                                    </span>
                        </div>
                        <div>Complete the pre-screen questions to determine your eligibility.</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{url('admin/working_hours')}}">
                        <div>
                            <strong>Working Hours</strong>
                            <span class="pull-right text-muted">
                                        <em>Case managers only</em>
                                    </span>
                        </div>
                        <div>Schedule your availability</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{url('events')}}">
                        <div>
                            <strong>Events</strong>
                            <span class="pull-right text-muted">
                                        <em>Scheduled Events</em>
                                    </span>
                        </div>
                        <div>Public events</div>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-tasks">
                <li class="divider"></li>
                <li>
                    <a href="{{url('statistics')}}">
                        <div>
                            <strong>Statistics</strong>
                            <span class="pull-right text-muted">
                                        <em>MN stats/Data</em>
                                    </span>
                        </div>
                        <div>Links to other sites</div>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-cogs fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="{{url('admin/clients')}}">
                        <div>
                            <i class="fa fa-group fa-fw"></i> Clients
                            <span class="pull-right text-muted small">{{\App\Client::all()->count()}}</span>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/users')}}">
                        <div>
                            <i class="fa fa-user fa-fw"></i> Users
                            <span class="pull-right text-muted small">{{\App\User::all()->count()}}</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/employees')}}">
                        <div>
                            <i class="fa fa-user fa-fw"></i> Employees
                            <span class="pull-right text-muted small">{{\App\Employee::all()->count()}}</span>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.roles.index')}}">
                        <div>
                            <i class="fa fa-briefcase fa-fw"></i> Roles
                            <span class="pull-right text-muted small">User Roles</span>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('auth.change_password')}}">
                        <div>
                            <i class="fa fa-user-secret fa-fw"></i> Change Password
                            <span class="pull-right text-muted small">Only System Users</span>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>

            <ul class="dropdown-menu dropdown-user">
                @if(Auth::user())
                <li>
                    {!! Form::open(['route' => 'auth.logout', 'id' => 'logout']) !!}
                    <button type="submit" class="btn btn-block btn-warning"><i class="fa fa-sign-out fa-fw"></i> Logout</button>
                    {!!Form::close()!!}
                </li>
                @else
                    <li><a href="{{url('login')}}"><i class="fa fa-user fa-fw"></i> Login</a>
                @endif

            </ul>

            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

</nav>
@if( Session::has('flash_message'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myFlashModal').modal();
        });
    </script>
@endif

<!-- Modal -->
<div class="modal" id="myFlashModal" role="dialog">
    <div class="modal-dialog">
            <div class="alert alert-success alert-dismissable">
                <strong>Success!</strong> {{Session::get('flash_message')}}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
    </div>
</div>
<div id="wrapper" style="background-color: #5583b4">
    @if ($errors->count() > 0)
        <div class="note note-danger">
            <ul class="list-unstyled">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="page-wrapper">
        @yield('content')
    </div>

</div>

<script>

</script>

@include('partials.javascripts')
</body>

</html>