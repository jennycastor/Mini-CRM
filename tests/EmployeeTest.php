<?php

namespace Tests\Unit;

use App\Models\Employee;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        // Create a new employee
        $employee = Employee::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'company_id' => 1, // Assuming you have a company with ID 1 in the database
            'phone' => '1234567890',
        ]);

        // Retrieve the employee from the database
        $savedEmployee = Employee::find($employee->id);

        // Assert that the saved employee matches the original employee data
        $this->assertEquals('John', $savedEmployee->first_name);
        $this->assertEquals('Doe', $savedEmployee->last_name);
        $this->assertEquals('john@example.com', $savedEmployee->email);
        $this->assertEquals(1, $savedEmployee->company_id);
        $this->assertEquals('1234567890', $savedEmployee->phone);
    }
}
