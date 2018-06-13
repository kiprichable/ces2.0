@extends('layouts.master')

@section('content')
    <div id="page-wrapper" style="margin-top: 5%">
        <div class="row">
            <div class="col-lg-12" style="background-color: #4db3a2">
                <h2  class="lead page-header">Statistics/Data.</h2>

            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="" style="margin: 2%">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    @foreach($statistics as $statistic)
                        <div id="menu">
                            <a href="{{url('data/'.$statistic->id.'/edit')}}" class="pull-right"><span class="fa fa-edit "></span></a>
                            <div class="panel list-group">
                                <a href="#" class="list-group-item" data-toggle="collapse" data-target="#{{$statistic->id}}" data-parent="#menu">{{$statistic->title}}
                                    <span class="fa fa-folder-open pull-right">
                                            <a href="{{url('data/'.$statistic->id.'/edit')}}"></a>
                                        </span>
                                </a>
                                <div id="{{$statistic->id}}" class="sublinks collapse panel-body">

                                        {!!  $statistic->content !!}

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
            </div>
        </div>
        @if(Auth::user())
            <div class="pull-right" style="margin: 2%">
                <a href="{{url('admin/statistics/create')}}" class="btn btn-block btn-primary">
                    <span class="fa fa-plus"> Add New</span>
                </a>
            </div>
            <div class="row">
                <table class="table table-condensed table-bordered" id="myTable">
                    <thead>
                    <tr>
                        <th>Statistic Name</th>
                        @if(Auth::user())
                            <th>Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($statistics as $statistic)
                        <tr>
                            <td>{{$statistic->title}}</td>
                            @if(Auth::user())
                                <td>
                                    <a href="{{'admin/statistics/'.$statistic->id.'/edit'}}" class="btn btn-warning">
                                        <span class="fa fa-edit"> Edit</span>
                                    </a>


                                    <button class="btn btn-danger" id="delete{{$statistic->id}}">
                                        <span class="fa fa-trash"> Delete</span>
                                    </button>
                                    {!! Form::open(['method' => 'DELETE', 'url' => 'admin/statistics/'.$statistic->id,'id' => $statistic->id]) !!}
                                    {{Form::close()}}

                                </td>
                            @endif
                        </tr>
                        <script>
                            $(document).ready(function()
                            {
                                $('{{'#delete'.$statistic->id}}').click(function () {


                                    var r = confirm("Are you sure you want to delete this statistic");
                                    if (r == true) {
                                        $('{{'#'.$statistic->id}}').submit();

                                    } else {

                                    }
                                })

                            } );
                        </script>
                    @endforeach

                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

        } );
    </script>
@stop