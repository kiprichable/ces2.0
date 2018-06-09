@extends('layouts.master')

@section('content')
    <div id="page-wrapper" style="margin-top: 5%">
        <div class="row">
            <div class="col-lg-12" style="background-color: #4db3a2">
                <h2  class="lead page-header">Statistics/Data.</h2>
            </div>
            <!-- /.col-lg-12 -->
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
                                <a href="{{}}" class="btn btn-warning">
                                    <span class="fa fa-edit"> Edit</span>
                                </a>
                                <button class="btn btn-danger">
                                    <span class="fa fa-trash"> Delete</span>
                                </button>

                            </td>
                        @endif
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
  @stop