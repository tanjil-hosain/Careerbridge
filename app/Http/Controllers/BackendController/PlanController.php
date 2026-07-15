<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::latest()->paginate(10);

        return view('backend.admin.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:plans,name',
            'price'       => 'required|numeric|min:0',
            'job_limit'   => 'required|integer|min:1',
            'duration'    => 'required|integer|min:1',
            'description' => 'nullable|string',
            'status'      => 'required|boolean',
        ]);

        $plan = new Plan();
        $plan->name        = $request->name;
        $plan->price       = $request->price;
        $plan->job_limit   = $request->job_limit;
        $plan->duration    = $request->duration;
        $plan->description = $request->description;
        $plan->status     = $request->status;

        $plan->save();
        return redirect()
            ->route('admin.plans.index')
            ->with('success', 'Subscription Plan Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
