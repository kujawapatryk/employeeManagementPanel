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
        return $this->employee->with(['company', 'dietaryPreference'])->get();
    }

    public function create($data)
    {
        return $this->employee->create($data);
    }

    public function update(Employee $employee, array $validatedData): bool
    {
        return $employee->update($validatedData);
    }

    public function delete(Employee $employee): bool{
        return $employee->delete();
    }
}
