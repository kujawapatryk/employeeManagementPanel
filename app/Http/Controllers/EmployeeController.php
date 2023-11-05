<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Company;
use App\Models\DietaryPreference;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    private EmployeeRepository $employee;
    public function __construct(EmployeeRepository $employee){
        $this->employee = $employee;
    }

    public function index(): View
    {

        //dd($this->employee->filterBy());
        return view('employee.list',[
            'employees' => $this->employee->filterBy(),
        ]);

    }

    public function showDetails()
    {
        return $this->employee->getOne(2);
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
        $validatedData = $request->validated(); // Pobierz zweryfikowane dane jako tablicę
        $this->employee->create($validatedData);
        return redirect()->route('employees.create')->with('success', 'Pracownik został dodany.');
    }

    public function edit()
    {

    }

    public function remove()
    {

    }
    //
}
