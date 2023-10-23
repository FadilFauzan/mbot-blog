@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex gap-1 col-lg-10 mb-3">
        <a href="/dashboard/posts" class="btn btn-sm btn-primary mb-3 text-white">
            <span class="text-white" data-feather="file"></span> My Posts
        </a>

        {{-- <div class="ms-auto">
            {{ $posts->links() }}
        </div> --}}
    </div>

    <!-- Name -->
    <div class="form-floating mb-2">
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
            value="{{ auth()->user()->name }}" required/>
        <label for="name">Name</label>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- Username -->
    <div class="form-floating mb-2">
        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" 
            value="{{ auth()->user()->username }}" required/>
        <label for="username">Username</label>
        @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- email -->
    <div class="form-floating mb-3">
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
            value="{{ auth()->user()->email }}" required/>
        <label for="email">Email</label>
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

@endsection