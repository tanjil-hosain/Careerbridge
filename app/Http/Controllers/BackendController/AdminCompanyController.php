<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Company;

class AdminCompanyController extends Controller
{
 public function index()
{
    $companies = Company::with('user')
        ->withCount('job')
        ->latest()
        ->paginate(10);

    return view('backend.admin.company.index', compact('companies'));
}
    public function show(Company $company)
    {
        $company->load(['user', 'job']);

        return view('admin.company.show', compact('company'));
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()
            ->route('admin.companies.index')
            ->with('success', 'Company deleted successfully.');
    }
}