<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository
{
    private Employee $employee;

    public function __construct(Employee $employee){
        $this->employee = $employee;
    }

    public function getOne(int $id)
    {
        return $this->employee->find($id);
    }

    public function filterBy()
    {
        return $this->employee->get();
    }

    public function create($data)
    {
        if (isset($data['phone_numbers']) && is_array($data['phone_numbers'])) {
            $data['phone_numbers'] = json_encode($data['phone_numbers']);
        }

        return $this->employee->create($data);
    }
}
