<?php

namespace Tests\Unit;

use App\Models\Company;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        // Create a new company
        $company = Company::create([
            'name' => 'Example Company',
            'email' => 'example@example.com',
            'logo' => null,
            'website' => 'https://example.com',
        ]);

        // Retrieve the company from the database
        $savedCompany = Company::find($company->id);

        // Assert that the saved company matches the original company data
        $this->assertEquals('Example Company', $savedCompany->name);
        $this->assertEquals('example@example.com', $savedCompany->email);
        $this->assertNull($savedCompany->logo);
        $this->assertEquals('https://example.com', $savedCompany->website);
    }
}
