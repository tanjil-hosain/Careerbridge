<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Inertia\Inertia;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::withCount([
            'job' => function ($query) {
                $query->where('status', 1);
            }
        ])
            ->latest()
            ->paginate(9);

        return Inertia::render('Companies/Index', [

            'companies' => $companies,

        ]);
    }
    public function show(Company $company)
    {
        $company->load([
            'job' => function ($query) {
                $query->where('status', 1)
                    ->latest();
            }
        ]);

        return Inertia::render('Companies/Show', [

            'company' => $company,

        ]);
    }
}
