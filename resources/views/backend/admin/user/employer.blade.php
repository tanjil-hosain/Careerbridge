@extends('backend.admin.layouts.master')

@section('content')
    <main class="page-content">

        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h3 class="fw-bold">Employers</h3>

                    <p class="text-muted mb-0">
                        Manage all employers
                    </p>

                </div>

                <span class="badge bg-primary fs-6">
                    Total : {{ $users->total() }}
                </span>

            </div>

            <div class="card border-0 shadow rounded-4">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-light">

                                <tr>

                                    <th>#</th>

                                    <th>Company</th>

                                    <th>Owner</th>

                                    <th>Email</th>

                                    <th>Total Jobs</th>

                                    <th>Joined</th>

                                    <th width="150">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($users as $user)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>

                                        <td>

                                            <div class="d-flex align-items-center">

                                                @if (optional($user->company)->logo)
                                                    <img src="{{ asset('storage/' . $user->company->logo) }}" width="45"
                                                        height="45" class="rounded-circle me-2"
                                                        style="object-fit:cover;">
                                                @endif

                                                <div>

                                                    <strong>{{ optional($user->company)->company_name ?? 'N/A' }}</strong>

                                                </div>

                                            </div>

                                        </td>

                                        <td>{{ $user->name }}</td>

                                        <td>{{ $user->email }}</td>

                                        <td>

                                            {{ $user->company ? $user->company->job->count() : 0 }}

                                        </td>

                                        <td>

                                            {{ $user->created_at->format('d M Y') }}

                                        </td>

                                        <td>

                                            <a href="{{ route('admin.users.show', $user) }}"
                                                class="btn btn-outline-primary btn-sm">

                                                <i class="bi bi-eye"></i>

                                            </a>

                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                class="d-inline">

                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('Delete employer?')">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7" class="text-center py-5">

                                            No Employers Found

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <div class="mt-3">

                        {{ $users->links() }}

                    </div>

                </div>

            </div>

        </div>

    </main>
@endsection
