@extends('backend.admin.layouts.master')

@section('content')

<main class="page-content">

    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="fw-bold mb-1">Job Seekers</h3>

                <p class="text-muted mb-0">
                    Manage all job seekers
                </p>
            </div>

            <span class="badge bg-success fs-6">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Applications</th>
                                <th>Joined</th>
                                <th width="150">Action</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($users as $user)

                                <tr>

                                    <td>
                                        {{ $users->firstItem() + $loop->index }}
                                    </td>

                                    <td>

                                        <div class="d-flex align-items-center">

                                            <div
                                                class="rounded-circle bg-success-subtle text-success
                                                       d-flex align-items-center justify-content-center me-2"
                                                style="width:45px;height:45px;"
                                            >

                                                <i class="bi bi-person fs-5"></i>

                                            </div>

                                            <div>

                                                <strong>
                                                    {{ $user->name }}
                                                </strong>

                                            </div>

                                        </div>

                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>

                                        <span class="badge bg-primary">
                                            {{ $user->applications_count }}
                                        </span>

                                    </td>

                                    <td>
                                        {{ $user->created_at->format('d M Y') }}
                                    </td>

                                    <td>

                                        <a
                                            href="{{ route('admin.users.show', $user) }}"
                                            class="btn btn-outline-primary btn-sm"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <form
                                            action="{{ route('admin.users.destroy', $user) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Delete this job seeker?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-outline-danger btn-sm"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center py-5">

                                        <i class="bi bi-people fs-1 text-muted"></i>

                                        <p class="text-muted mt-2 mb-0">
                                            No Job Seekers Found
                                        </p>

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