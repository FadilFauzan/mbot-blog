@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session()->has('fail'))
        <div class="alert alert-warning alert-dismissible fade show col-lg-10" role="alert">
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="/dashboard/posts/create" class="btn btn-primary mb-3"> 
        <span data-feather="plus"></span> New post
    </a>
    <a href="/posts" class="btn btn-secondary mb-3"> 
        <span data-feather="file-text"></span> All Post
    </a>
    <div class="table-responsive col-lg-10">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        <a href="/dashboard/posts/{{ $post->slug }}" class="text-decoration-none">
                            <button class="badge bg-info border-0" title="Show">
                                <span class="text-white" data-feather="eye"></span>
                            </button>
                        </a>
                        
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-decoration-none">
                            <button class="badge bg-warning border-0" title="Edit">
                                <span class="text-white" data-feather="edit"></span>
                            </button>
                        </a>

                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
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

        @if (!$posts->count())
            <p class="text-center fs-4 mt-5">No Post Found.</p>
        @endif
    </div>
@endsection