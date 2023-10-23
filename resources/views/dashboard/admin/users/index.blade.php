@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex gap-1 col-lg-10">
        <a href="/dashboard/admin/categories" class="btn btn-sm btn-primary mb-3 text-white">
            <span class="text-white" data-feather="grid"></span> Categories
        </a>
        <a href="/dashboard/admin/posts" class="btn btn-sm btn-secondary mb-3"> 
            <span data-feather="file-text"></span> All Post
        </a>
        {{-- <div class="ms-auto">
            {{ $posts->links() }}
        </div> --}}
    </div>

    <div class="table-responsive col-lg-12 col-xl-10">
        <table class="table table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Join at</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sortedUsers as $user)
                <tr style="vertical-align: middle;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d-m-Y') }}</td>
                    <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                    <td style="vertical-align: middle; text-align: center;">
                        <div class="d-flex justify-content-center gap-1">
                            <form action="/dashboard/admin/users/{{ $user->username }}" method="post" class="d-inline">
                                @method('put')
                                @csrf
                                <input type="hidden" name="is_admin" value="{{ $user->is_admin ? '0' : '1' }}">
                                <button type="submit" class="badge bg-{{ $user->is_admin ? 'danger' : 'info' }} border-0" 
                                    onclick="return confirm('Are you sure?')" title="{{ $user->is_admin ? 'Unadmin' : ' Make administrator' }}"
                                    style="{{ $user->username === 'fadil.ahmad.fauzan' ? 'display: none' : '' }}">
                                    <span class="text-white" data-feather="{{ $user->is_admin ? 'user-minus' : 'user-plus' }}"></span>
                                </button>
                            </form>

                            <form action="/dashboard/admin/users/{{ $user->username }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')" title="Delete"
                                    style="{{ $user->username === 'fadil.ahmad.fauzan' ? 'display: none' : '' }}">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if (!$sortedUsers->count())
            <p class="text-center fs-4 mt-5">No User Found.</p>
        @endif
    </div>

@endsection