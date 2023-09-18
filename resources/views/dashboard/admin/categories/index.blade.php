@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="/dashboard/admin/categories/create" class="btn btn-sm btn-primary mb-3"> 
        <span data-feather="plus"></span> New Category
    </a>
    <a href="/dashboard/admin/posts" class="btn btn-sm btn-success mb-3"> 
        <span data-feather="users"></span> Users
    </a>
    <a href="/dashboard/admin/posts" class="btn btn-sm btn-secondary mb-3"> 
        <span data-feather="file-text"></span> All Post
    </a>

    <div class="table-responsive col-lg-6">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>

                        <a href="/dashboard/admin/categories/{{ $category->slug }}" class="text-decoration-none">
                            <button class="badge bg-info border-0" title="Show posts by category">
                                <span class="text-white" data-feather="file"></span>
                            </button>
                        </a>

                        <a href="/dashboard/admin/categories/{{ $category->slug }}/edit" class="text-decoration-none">
                            <button class="badge bg-warning border-0" title="Edit">
                                <span class="text-white" data-feather="edit"></span>
                            </button>
                        </a>

                        <form action="/dashboard/admin/categories/{{ $category->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')" title="Delete">
                                <span data-feather="x-circle"></span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection