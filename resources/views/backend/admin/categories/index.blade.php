@extends('backend.admin.layouts.master')

@section('content') <div class="page-content">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="mb-1">Categories</h4>
            <p class="mb-0 text-secondary">Manage all job categories from here.</p>
        </div>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Add Category
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categoris as $category)
                          
                        
                        
                            <tr>
                                <td>{{ $category->id }}</td>

                                <td>
                                    <strong>{{ $category->name }}</strong>
                                </td>

                                <td>{{ $category->slug }}</td>

                                <td>
                                    {{ $category->description ?: 'No description' }}
                                </td>

                                <td>
                                    @if ($category->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>

                                

                                <td class="text-end">
                                    <a
                                        href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="btn btn-sm btn-outline-primary"
                                        title="Edit"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.categories.destroy', $category->id) }}"
                                        method="POST"
                                        class="d-inline"
                                       
                                    >
                                        @csrf
                                        @method('Delete')

                                        <button type="submit"  onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="bi bi-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        {{-- @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-secondary">
                                    No categories found.
                                </td>
                            </tr> --}}
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@endsection
