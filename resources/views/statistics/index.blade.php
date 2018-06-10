@extends('layouts.master')

@section('content')
    <div id="page-wrapper" style="margin-top: 5%">
        <div class="row">
            <div class="col-lg-12" style="background-color: #4db3a2">
                <h2  class="lead page-header">Statistics/Data.</h2>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="pull-right" style="margin: 2%">
            <a href="{{'statistics/create'}}" class="btn btn-block btn-primary">
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
                                <a href="{{'statistics/'.$statistic->id.'/edit'}}" class="btn btn-warning">
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
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

        } );
    </script>
  @stop