<?php
namespace App\Repositories\Employee;


use App\Models\Employee;

interface EmployeeInterfaceContract
{
    public function sendEmail(Employee $employee,$appointment);

}