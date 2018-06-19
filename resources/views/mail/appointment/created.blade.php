@component('mail::message')
A new appointment has been scheduled on your calendar.
Please click on the link below to view your upcoming appointments.'
@component('mail::button', ['url' => url('admin/appointments')])
Appointments
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
