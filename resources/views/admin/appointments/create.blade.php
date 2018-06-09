@extends('layouts.master')

@section('content')
	@include('partials.dashboard')
    <h3 class="page-title">@lang('quickadmin.appointments.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.appointments.store']]) !!}

	<div class="panel panel-default">
		<div class="panel-heading">
			@lang('quickadmin.qa_edit')
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 form-group">
					{!! Form::label('client_id', 'Client*', ['class' => 'control-label']) !!}
					{!! Form::select('client_id', $clients ,old('client_id'), ['class' => 'form-control', 'required' => '']) !!}
					<p class="help-block"></p>
					@if($errors->has('client_id'))
						<p class="help-block">
							{{ $errors->first('client_id') }}
						</p>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 form-group">
					{!! Form::label('employee_id', 'Employee*', ['class' => 'control-label']) !!}
					{!! Form::select('employee_id', $employees,old('employee_id'), ['class' => 'form-control', 'required' => '']) !!}
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
					{!! Form::label('start_time', 'Start time*', ['class' => 'control-label']) !!}
					{!! Form::text('start_time', old('start_time'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
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
					{!! Form::text('finish_time', old('finish_time'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
					<p class="help-block"></p>
					@if($errors->has('finish_time'))
						<p class="help-block">
							{{ $errors->first('finish_time') }}
						</p>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 form-group">
					{!! Form::label('comments', 'Comments', ['class' => 'control-label']) !!}
					{!! Form::textarea('comments', old('comments'), ['class' => 'form-control ', 'placeholder' => '']) !!}
					<p class="help-block"></p>
					@if($errors->has('comments'))
						<p class="help-block">
							{{ $errors->first('comments') }}
						</p>
					@endif
				</div>
			</div>

		</div>
	</div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-block btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss"
        });
    </script>
	<script>
	$('.date').datepicker({
		autoclose: true,
		dateFormat: "{{ config('app.date_format_js') }}"
	}).datepicker("setDate", "0");
    </script>
	<script>
		$("#service_id").on("change", function() {
			$("#price").val($('option:selected', this).attr('data-price'));
			var date = $("#date").val();
			var service_id = $("#service_id").val();
			UpdateEmployees(service_id, date);
		});
	
		$("#date").change(function() {
			var service_id = $("#service_id").val();
			var date = $("#date").val();
			UpdateEmployees(service_id, date);
		});
		
		$("#starting_hour, #finish_hour, #starting_minute, #finish_minute").on("change", function () {
			CountPrice();		
		});
		
		$('body').on("change", "input[type=radio][name=employee_id]", function() {
			var employee_id = $(this).val();
			var starting_hour = parseInt($(".starting_hour_"+employee_id).text());
			var starting_minute = $(".starting_minute_"+employee_id).text();
			var finish_hour = starting_hour+1;
			if(finish_hour < 10) {
				finish_hour = "0"+finish_hour;
			}
			if(starting_hour < 10) {
				starting_hour = "0"+starting_hour;
			}
			$('#starting_hour option[value='+starting_hour+']').prop('selected','true');
			$('#starting_minute option[value='+starting_minute+']').prop('selected','true');
			$('#finish_hour option[value='+finish_hour+']').prop('selected','true');
			$('#finish_minute option[value='+starting_minute+']').prop('selected','true');
			$("#start_time, #finish_time").show();
			CountPrice();
		});
		
		function CountPrice() {
			var start_hour = parseInt($("#starting_hour").val());
			var start_minutes = parseInt($("#starting_minute").val());
			var finish_hour = parseInt($("#finish_hour").val());
			var finish_minutes = parseInt($("#finish_minute").val());
			var total_hours = (((finish_hour*60+finish_minutes)-(start_hour*60+start_minutes))/60);
			var price = parseFloat($("#price").val());
			$("#price_total").html(price*total_hours);
			$("#time").html(total_hours);
			if(start_hour != -1 && start_minutes != -1 && finish_hour != -1 && finish_minutes != -1) {
				$("#results").show();
			}
		}
		
		function UpdateEmployees(service_id, date)
		{
			if(service_id != "" && date != "") {
				$.ajax({
					url: '{{ url("admin/get-employees") }}',
					type: 'GET',
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					data: {service_id:service_id, date:date},
					success:function(option){
						//alert(option);
						$(".employees").remove();
						$("#date").closest(".row").after(option);
						$("#start_time, #finish_time").hide();
						$("#results").hide();
					}
				});
			}
		}
	</script>

@stop