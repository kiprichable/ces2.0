<?php
namespace App\Repositories\Employee;
use App\Notifications\AppointmentNotification;
use App\Models\Employee;

class EmployeeInterface implements EmployeeInterfaceContract
{
    public function sendEmail(Employee $employee,$appointment)
    {
        $employee->notify(new AppointmentNotification($appointment));
    }
}