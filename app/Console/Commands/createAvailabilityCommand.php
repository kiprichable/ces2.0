<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Repositories\Availability\AvailabilityInterface;
use Illuminate\Console\Command;

class createAvailabilityCommand extends Command
{
    protected $interfaceContract;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:availability';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Break down availability per Hour';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(AvailabilityInterface $interfaceContract)
    {
        parent::__construct();
        $this->interfaceContract = $interfaceContract;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $employees = Employee::all();

        foreach ($employees as $employee)
        {
            $data = $this->interfaceContract->getAllAvailability($employee);

            $this->interfaceContract->create($data);
        }

    }
}
