<div class="row">
    <div class="col-lg-12">
        <h3  class="lead page-header">SCHEDULE AN APPOINTMENT WITH US!.</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

<h2>Available Appointment Slots.</h2>
<p class="lead">
    To view availability of each case manager click view on the list below!.
</p>

<div class="alert alert-warning">
    <h4>Appointment instructions</h4>
    <p>In order to successfully make an appointment please do the following!.</p>
</div>

<hr />
<h3>Case Managers.</h3>
<hr />

<table id="employee-list" class="table table-striped table-bordered" cellspacing="0" width="100%">

</table>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

@foreach(\App\Employee::all() as $employee)
    <div id='{{$employee->id}}'>

    </div>
@endforeach

<script>
    $(function() {
        $('#employee-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('employees-list') }}',
            columns: [
                { data: 'first_name', name: 'first_name' },
                { data: 'last_name', name: 'last_name' },
                {data: 'action', name: 'action', orderable: false, searchable: false}

            ]
        });
    });
</script>