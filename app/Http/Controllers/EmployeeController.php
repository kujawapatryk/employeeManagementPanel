<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Company;
use App\Models\DietaryPreference;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    private EmployeeRepository $employeeRepo;
    public function __construct(EmployeeRepository $employeeRepo){
        $this->employeeRepo = $employeeRepo;
    }

    public function index(): View
    {

        //dd($this->employee->filterBy());
        return view('employee.list',[
            'employees' => $this->employeeRepo->filterBy(),
        ]);

    }

    public function showDetails()
    {
        return $this->employeeRepo->getOne(2);
    }

    public function create(): View
    {
        return view('employee.create',[
            'companies' => Company::all(),
            'dietaryPreferences' => DietaryPreference::all()
        ]);
    }

//StoreEmployeeRequest
    public function store(StoreEmployeeRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $this->employeeRepo->create($validatedData);
        return redirect()
            ->route('employees.create')
            ->with('success', 'Pracownik został dodany.');
    }

    public function edit(Employee $employee): view
    {

        return view('employee.edit',[
            'companies' => Company::all(),
            'dietaryPreferences' => DietaryPreference::all(),
            'employee' => $employee
             ]);

    }

    public function update(StoreEmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $validatedData = $request->validated();
        if ($this->employeeRepo->update($employee, $validatedData)) {
            return redirect()
                ->route('employees.list')
                ->with('success', 'Dane pracownika zostały zaktualizowane.');
        } else {
            return back()
                ->withErrors('Nie udało się zaktualizować danych pracownika.');
        }
    }

    public function remove(Employee $employee): RedirectResponse
    {
        if ($this->employeeRepo->delete($employee)) {
        return redirect()
            ->route('employees.list')
            ->with('success', 'Pracownik został pomyślnie usunięty.');
        } else {
            return back()
                ->withErrors('Nie udało się usunąć pracownika.');
        }
    }
    //
}
