@extends('layouts.master')
@section('content')
    <div id="page-wrapper" style="margin-top: 5%">
        <div class="row">
            <div class="col-lg-12" style="background-color: #4db3a2">
                <h2  class="lead page-header">Request Housing: Pre Screen.</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row" style="margin-top: 2%">
            <div class="container-fluid">
                <section class="container">
                    <div class="container-page">
                        @if(Session::has('Error'))
                            <div class="alert alert-danger">
                                <span class="glyphicon glyphicon-remove"></span><strong> {{Session::get('Error')}} </strong>
                            </div>
                        @endif
                        <div class="col-md-6">

                            <h3 class="dark-grey">Pre Screen: Questions</h3>
                            <hr>

                            <div style="display:none" id="error">
                                <div class="alert alert-danger">
                                    <strong><p>Please select an answer for each of the three questions</p></strong>
                                </div>
                            </div>


                            <div id="question1">
                                <p>Are you now, or” to “Do you believe you will become homeless in the next 14 days?</p>
                                <div class="radio">
                                    <label><input type="radio" name="quiz1" value="Yes">Yes</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="quiz1" value="No">No</label>
                                </div>
                                <div class="radio disabled">
                                    {{--<button type="submit" class="col-lg-12 btn btn-primary" id="quiz1">Next</button>--}}
                                </div>
                            </div>
                            <div id="question2">
                                <p>Are you in need of shelter, in a housing crisis, or seeking housing assistance today?</p>
                                <div class="radio">
                                    <label><input type="radio" name="quiz2" value="Yes">Yes</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="quiz2" value="No">No</label>
                                </div>
                                <div class="radio disabled">
                                    {{--<button type="submit" class="col-lg-12 btn btn-primary" id="quiz2">Next</button>--}}
                                </div>
                            </div>
                            <div id="question3">
                                <p>Are you seeking housing due to concern for your safety, or fear of violence or abuse from another person/partner staying with you?</p>
                                <div class="radio">
                                    <label><input type="radio" name="quiz3" value="Yes">Yes</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="quiz3" value="No">No</label>
                                </div>
                            </div>
                            <div id="dialog" title="Contact" class="alert alert-danger" hidden>
                                <p>
                                    If your life is in danger please call 911. To report domestic abuse, call your local
                                    211.
                                </p>
                            </div>
                            <button type="submit" class="col-lg-12 btn btn-primary" id="next">Next</button>

                        </div>

                        <div class="col-lg-6">
                            <h3 class="dark-grey">About CES</h3>
                            <hr>
                            <p>
                                Coordinated Entry System offers an organized, efficient approach to providing homeless families
                                with services and housing by linking them to programs and matching families' needs to providers'
                                strengths and capacity.</br>
                                United Way 211 performs a preliminary screening to determine a household's need for housing resources.</br>
                                Eligible households are scheduled for an appointment with case manager for an assessment that will be
                                conducted in a face to face interview at one of several pre-established countywide locations. </br>
                                CE staff will place families on a housing placement roster to receive services on a space available basis.
                            </p>


                            {{--<button type="submit" class="col-lg-12 btn btn-primary">Submit</button>--}}
                        </div>
                        </div>

                        <script type="text/javascript">
                            $("#next").click(function(){

                                var radioValue1 = $("input[name='quiz1']:checked").val();
                                var radioValue2 = $("input[name='quiz2']:checked").val();
                                var radioValue3 = $("input[name='quiz3']:checked").val();



                                if(!$("input[name='quiz1']:checked").val())
                                {
                                    $("#error").show();
                                }
                                if(!$("input[name='quiz2']:checked").val())
                                {
                                    $("#error").show();
                                }
                                if(!$("input[name='quiz3']:checked").val())
                                {
                                    $("#error").show();
                                }
                                else
                                {
                                    if(radioValue1 == 'Yes' && radioValue2 == 'Yes')
                                    {
                                        if(radioValue3 == 'Yes')
                                        {
                                            $( function() {
                                                $( "#dialog" ).dialog();
                                            });
                                            $('#dialog').on('dialogclose', function(event)
                                            {
                                                window.location.replace("{{url('home')}}");
                                            });
                                        }
                                        else
                                        {
                                            window.location.replace("{{url('home')}}");
                                        }

                                    }
                                    else
                                    {
                                        alert('If you need help call us first: United Way: 2-1-1 Or  1.800.543.7709 Hours: Monday' +
                                            ' - Thursday 1:00 p.m. - 4:30p.m. OR contact Group Residential Housing St Louis ' +
                                            'County Triage Staff (218)726-2199');
                                    }
                                }



                            })

                        </script>


                    </div>
                </section>
                <hr>
            </div>
        </div>
@stop