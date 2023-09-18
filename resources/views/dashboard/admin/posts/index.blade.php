@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex gap-1 mb-2">
        <a href="/dashboard/admin/categories" class="btn btn-sm btn-primary mb-3"> 
            <span data-feather="grid"></span> Categories
        </a>
        <a href="/dashboard/admin/users" class="btn btn-sm btn-success mb-3"> 
            <span data-feather="users"></span> Users
        </a>

        <div class="ms-auto">
            {{ $posts->links() }}
        </div>
    </div>

    <div class="table-responsive col-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr style="vertical-align: middle;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->author->name }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td style="vertical-align: middle; text-align: center;">
                        <div class="d-flex justify-content-center gap-1">
                            <a href="/dashboard/admin/posts/{{ $post->slug }}" class="text-decoration-none">
                                <button class="badge bg-info border-0" title="Show">
                                    <span class="text-white" data-feather="eye"></span>
                                </button>
                            </a>

                            <form action="/dashboard/admin/posts/{{ $post->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')" title="Delete">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if (!$posts->count())
            <p class="text-center fs-4 mt-5">No Post Found.</p>
        @endif
    </div>

@endsection