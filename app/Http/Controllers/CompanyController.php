<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyRequest;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $companies = Company::all(); // Fetch the companies from the database
         $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'url',
        ]);

        if ($request->hasFile('logo')) {
            $request->file('logo')->store('public/company_logos');
            // Perform additional actions or return a response
        } else {
            $nullImagePath = public_path('storage/company_logos/null_logo.png');
            $filename = 'null_logo.png';

            // Save the null image as the logo
            Storage::disk('public')->put('storage/company_logos/' . $filename, file_get_contents($nullImagePath));

        }

        // Example: Create a new company
        $company = Company::create($request->validated());

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id); // Retrieve the company by its ID
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id); // Retrieve the company by its ID
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'url',
        ]);

        $company = Company::findOrFail($id); // Retrieve the company by its ID
        // $data = $request->except('_token'); // Exclude the _token field from the data
        $company->update($request->all()); // Update the company using the request data


        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        // Delete the company from the database
    $company->delete();

    return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
