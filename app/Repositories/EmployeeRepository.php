<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function filterBy(array $request): LengthAwarePaginator
    {
        $query = $this->employee->with(['company', 'dietaryPreference']);
//dd($request);
        $searchTerm = $request['search'] ?? null;
        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('first_name', 'like', "%{$searchTerm}%")
                    ->orWhere('last_name', 'like', "%{$searchTerm}%")
                    ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }

        return $query->paginate(15);
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
