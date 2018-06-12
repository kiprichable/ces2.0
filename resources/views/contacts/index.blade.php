@extends('layouts.master')

@section('content')
    <div id="page-wrapper" style="margin-top: 5%">
        <div class="row">
            <div class="col-lg-12" style="background-color: #4db3a2">
                <h2  class="lead page-header">Contacts.</h2>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        @if(Auth::user())
            <div class="pull-right" style="margin: 2%">
                <a href="{{url('admin/contacts/create')}}" class="btn btn-block btn-primary">
                    <span class="fa fa-plus"> Add New</span>
                </a>
            </div>
            <div class="row">
                <table class="table table-condensed table-bordered" id="myTable">
                    <thead>
                    <tr>
                        <th>Contact Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Country</th>
                        @if(Auth::user())
                            <th>Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->title}}</td>
                            <td>{{$contact->address}}</td>
                            <td>{{$contact->city}}</td>
                            <td>{{$contact->state}}</td>
                            <td>{{$contact->zip}}</td>
                            <td>{{$contact->country}}</td>
                            @if(Auth::user())
                                <td>
                                    <a href="{{'admin/contacts/'.$contact->id.'/edit'}}" class="btn btn-warning">
                                        <span class="fa fa-edit"> Edit</span>
                                    </a>


                                    <button class="btn btn-danger" id="delete{{$contact->id}}">
                                        <span class="fa fa-trash"> Delete</span>
                                    </button>
                                    {!! Form::open(['method' => 'DELETE', 'url' => 'admin/contacts/'.$contact->id,'id' => $contact->id]) !!}
                                    {{Form::close()}}

                                </td>
                            @endif
                        </tr>
                        <script>
                            $(document).ready(function()
                            {
                                $('{{'#delete'.$contact->id}}').click(function () {


                                    var r = confirm("Are you sure you want to delete this contact");
                                    if (r == true) {
                                        $('{{'#'.$contact->id}}').submit();

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