<?php
namespace App\Repositories\Availability;


interface AvailabilityInterfaceContract
{
    public function getAllAvailability($employee);
    public function create($requestData);

}