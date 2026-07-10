<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = auth()->user()->company;

        return view('backend.employer.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->company) {
            return redirect()->route('employer.company.index');
        }
        return view('backend.employer.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'website' => 'nullable|url',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('companies', 'public');
        }

        $company = new Company();
        $company->user_id = auth()->id();
        $company->company_name = $request->company_name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->website = $request->website;
        $company->address = $request->address;
        $company->description = $request->description;
        $company->logo = $logoPath;
        $company->status = true;

        $company->save();
        return redirect()->route('employer.company.index')->with('success', 'Company Profile Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('backend.employer.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, Company $company)
{
    $request->validate([
        'company_name' => 'required|string',
        'email' => 'nullable|email',
        'phone' => 'nullable|string',
        'website' => 'nullable|url',
        'address' => 'nullable|string',
        'description' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $logoPath = $company->logo;

    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('companies', 'public');
    }

    $company->company_name = $request->company_name;
    $company->email = $request->email;
    $company->phone = $request->phone;
    $company->website = $request->website;
    $company->address = $request->address;
    $company->description = $request->description;
    $company->logo = $logoPath;

    $company->update();

    return redirect()
        ->route('employer.company.index')
        ->with('success', 'Company Profile Updated');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
