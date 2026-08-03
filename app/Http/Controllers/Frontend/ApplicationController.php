<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    public function create(Job $job)
{
    return Inertia::render('Jobs/Apply', [

        'job' => $job

    ]);
}

}