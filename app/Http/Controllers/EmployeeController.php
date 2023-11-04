<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeRepository;
use Illuminate\Http\Client\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    private EmployeeRepository $employee;
    public function __construct(EmployeeRepository $employee){
        $this->employee = $employee;
    }

    public function all(): View
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

    public function create(Request $request)
    {

    }

    public function edit()
    {

    }

    public function remove()
    {

    }
    //
}
