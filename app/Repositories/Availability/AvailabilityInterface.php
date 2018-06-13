<?php
namespace App\Repositories\Availability;

use App\Models\Availability;
use Carbon\Carbon;
class AvailabilityInterface implements AvailabilityInterfaceContract
{
    public function getAllAvailability($employee)
    {
        $d = strtotime('+'.'2'.' weeks', strtotime(date('Y-m-d')));
        $availability = array();
        $working_hours = $employee->working_hours()
                ->whereDate('date','>= ',date('Y-m-d'))
                ->whereDate('date','<=',date('Y-m-d', $d))
                ->orderBy('start_time')->get();


        foreach($working_hours as $hours)
        {
            $start_date = strtotime(Carbon::parse($hours->date.' '.$hours->start_time));
            $end_date = strtotime(Carbon::parse($hours->date.' '.$hours->finish_time));
            $available = ($end_date - $start_date)/3600;

            for($h = 0; $h < $available; $h++)
            {
                $availability[$hours->date.$h] = Carbon::parse($hours->start_time)->addHours($h)->format('H:i:s') .' - '. Carbon::parse($hours->start_time)->addHours($h + 1)->format('H:i:s');
            }

        }


        $requestData = array();
        foreach($this->_group_by($availability) as $val => $available)
        {
            foreach($available as $hours_available)
            {
                $requestData [] = [
                        'employee_id' =>$employee->id,
                        'start_time' => $val. ' '.substr($hours_available,0,8),
                        'finish_time' => $val. ' '. substr($hours_available,11,19)
                ];

            }
        }

        return $requestData;
    }
    function _group_by($array) {
        $return = array();

        foreach($array as $key => $val) {
            $return[substr($key,0,-1)][] = $val;
        }
        return $return;
    }


    public function create($requestData)
    {
        foreach ($requestData as $data)
        {
            Availability::firstOrCreate($data);
        }
    }
}