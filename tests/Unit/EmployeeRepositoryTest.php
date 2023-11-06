<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class EmployeeRepositoryTest extends TestCase
{
    use RefreshDatabase;
    protected EmployeeRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new EmployeeRepository(new Employee());
    }

    /** @test */
    public function it_can_retrieve_an_employee_by_id()
    {
        $employee = Employee::factory()->create();
        $found = $this->repository->getOne($employee->id);

        $this->assertInstanceOf(Employee::class, $found);
        $this->assertEquals($employee->id, $found->id);
    }

    /** @test */
    public function it_can_filter_employees_based_on_criteria()
    {
        $employee = Employee::factory()->create(['first_name' => 'John', 'last_name' => 'Doe']);
        $results = $this->repository->filterBy(['search' => 'John']);

        $this->assertInstanceOf(LengthAwarePaginator::class, $results);
        $this->assertEquals(1, $results->total());
        $this->assertEquals('John', $results->first()->first_name);
    }

    /** @test */
    public function it_can_create_an_employee()
    {

        $employeeData = Employee::factory()->make()->toArray();

        $employee = $this->repository->create($employeeData);

        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertEquals($employeeData['first_name'], $employee->first_name);
        $this->assertEquals($employeeData['last_name'], $employee->last_name);
        $this->assertEquals($employeeData['email'], $employee->email);
        $this->assertEquals($employeeData['company_id'], $employee->company_id);
        $this->assertEquals($employeeData['phone_numbers'], $employee->phone_numbers);
        $this->assertEquals($employeeData['dietary_preference_id'], $employee->dietary_preference_id);
    }

    /** @test */
    public function it_can_update_an_employee()
    {
        $employee = Employee::factory()->create();
        $updatedData = ['first_name' => 'John', 'last_name' => 'Doe Updated'];

        $success = $this->repository->update($employee, $updatedData);

        $this->assertTrue($success);
        $this->assertEquals('John', $employee->fresh()->first_name);
        $this->assertEquals('Doe Updated', $employee->fresh()->last_name);

    }

    /** @test */
    public function it_can_delete_an_employee()
    {
        $employee = Employee::factory()->create();
        $success = $this->repository->delete($employee);

        $this->assertTrue($success);
        $this->assertNull($this->repository->getOne($employee->id));
    }


}
