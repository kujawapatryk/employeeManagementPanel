<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
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
        $searchTerm = $request['search'] ?? null;
        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('first_name', 'like', "%{$searchTerm}%")
                    ->orWhere('last_name', 'like', "%{$searchTerm}%")
                    ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }
        $companyId = $request['company_id'] ?? null;
        if ($companyId) {
            $query->where('company_id', $companyId);
        }

        $sortBy = $request['sort_by'] ?? 'last_name';
        $sortOrder = $request['order'] ?? 'asc';

            if ($sortBy == 'company') {
                $query->join('companies', 'employees.company_id', '=', 'companies.id')
                    ->orderBy('companies.name', $sortOrder);
            } else {
                $query->orderBy($sortBy, $sortOrder);
            }

        return $query->paginate(config('employees.pagination.per_page'));
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
