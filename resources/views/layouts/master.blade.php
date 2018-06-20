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
        <a class="navbar-brand lead" href="{{url('/')}}"
           style="font-style: italic; color: whitesmoke;margin-bottom: -5%">ST.LOUIS COUNTY CONTINUUM OF CARE MN</a>
    </div>
    <!-- /.navbar-header -->
    @inject('request', 'Illuminate\Http\Request')
    <ul class="nav navbar-top-links navbar-right">
        <li>
            <a href="{{url('/')}}">
                <i class="fa fa-home"></i>
                Home
            </a>
        </li>
        <li>
            <a href="{{url('/admin/appointments/create')}}">
                <i class="fa fa-tasks"></i>
                Pre Screen/Make Appointment
            </a>
        </li>
        <li>
            <a href="{{url('events')}}">
                <i class="fa fa-calendar-check-o"></i>
                Events
            </a>
        </li>
        <li>
            <a href="{{url('statistics')}}">
                <i class="fa fa-database"></i>
                Stats/Data
            </a>
        </li>

        <!-- /.dropdown -->
        <!-- /.dropdown -->
        <li class="dropdown">
            @if(Auth::user())
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                    Welcome {!! Auth::user()->name !!}
                    <i class="fa fa-cogs fa-fw"></i> <i class="fa fa-caret-down"></i>


                </a>

                <ul class="dropdown-menu dropdown-alerts">
                    @if(Auth::user()->role_id == 1)
                        <li>
                            <a href="{{url('admin/clients')}}">
                                <div>
                                    <i class="fa fa-group fa-fw"></i> Clients
                                    <span class="pull-right text-muted small">{{\App\Models\Client::all()->count()}}</span>
                                </div>
                            </a>
                        </li>


                        <li>
                            <a href="{{url('admin/users')}}">
                                <div>
                                    <i class="fa fa-user fa-fw"></i> Users
                                    <span class="pull-right text-muted small">{{\App\Models\User::all()->count()}}</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/employees')}}">
                                <div>
                                    <i class="fa fa-user fa-fw"></i> Employees
                                    <span class="pull-right text-muted small">{{\App\Models\Employee::all()->count()}}</span>
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
                    @endif
                    <li>
                        <a href="{{route('auth.change_password')}}">
                            <div>
                                <i class="fa fa-user-secret fa-fw"></i> Change Password
                                <span class="pull-right text-muted small">Only System Users</span>
                            </div>
                        </a>
                    </li>

                    <li>
                        @if(Auth::user())
                            <div>
                                {!! Form::open(['route' => 'auth.logout', 'id' => 'logout']) !!}
                                <button type="submit" class="btn btn-block btn-warning">
                                    <i class="fa fa-sign-out fa-fw"></i> Logout
                                </button>
                                {!!Form::close()!!}
                            </div>
                        @else
                            <a href="{{url('login')}}">
                                <div>
                                    <i class="fa fa-user fa-fw"></i> Login
                                </div>
                            </a>
                        @endif
                    </li>


                </ul>

            @else
                <a href="{{url('login')}}">
                    <i class="fa fa-lock"></i> Login
                </a>
                @endif
                <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

</nav>
@if( Session::has('flash_message'))
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myFlashModalSuccess').modal();
        });
    </script>
@endif

@if( Session::has('flash_error'))
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myFlashModalError').modal();
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="myFlashModalSuccess" role="dialog">
    <div class="modal-dialog">
        <div class="alert alert-success alert-dismissable">
            <strong>Success!</strong> {{Session::get('flash_message')}}
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myFlashModalError" role="dialog">
    <div class="modal-dialog">
        <div class="alert alert-danger alert-dismissable">
            <strong>Error!</strong> {{Session::get('flash_error')}}
            <button type="button" class="close" data-dismiss="modal">&times;</button>
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