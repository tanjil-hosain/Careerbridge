@extends('backend.employer.layouts.master')

@section('content')
          <main class="page-content">
              
<div class="card bg-primary text-white shadow border-0 mb-4">

    <div class="card-body">

        <h3>
            👋 Welcome Back,
            {{ auth()->user()->name }}
        </h3>

        <p class="mb-0">

            Manage your jobs, applicants and subscription easily.

        </p>

    </div>

</div>



            
            
          </main>

@endsection