@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center">
    <form action="/login" method="post" class="uniqcustom col-10 col-lg-6 col-md-6 col-xl-5">
        @csrf

        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('status') }}
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2 class="text-center mb-4 text-primary">MBOT Blog</h2>

        <!-- Email input -->
        <div class="form-floating mb-2">
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email') }}"placeholder="email" autofocus required/>
            <label for="email">Email</label>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password input -->
        <div class="form-floating mb-3">
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                placeholder="password" autofocus required/>
            <label for="password">Password</label>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Submit button -->
        
        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} checked/>
                    <label class="form-check-label" for="remember"> Remember me </label>
                </div>
            </div>

            <div class="col">
                <!-- Simple link -->
                <a href="{{ route('password-request') }}" data-bs-toggle="modal" data-bs-target="#formModal">
                    Forgot password?
                </a>
            </div>
        </div>

        <!-- Submit button -->
        <div class="d-flex justify-content-end">
            <button type="submit" name="login" class="btn btn-primary mb-3 col">Login</button>
        </div>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not Registered? <a href="/register">Register</a></p>
            <small>or login with:</small>
        </div>

        {{-- Login with google --}}
        <div class="container d-flex justify-content-center mt-2">
            <a href="{{ route('google.login') }}">
            <div class="google-btn mb-2 col">
                <div class="google-icon-wrapper">
                    <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                </div>
                <span class="btn-text" style="margin-left: 65px">
                    <b>Login with google</b>
                </span>
            </div>
            </a>
        </div>

        {{-- Login with facebook --}}
        {{-- <div class="container d-flex justify-content-center">
            <a href="{{ route('facebook.login') }}">
            <div class="google-btn mb-2 col">
                <div class="google-icon-wrapper">
                    <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/en/0/04/Facebook_f_logo_%282021%29.svg"/>
                </div>
                <span class="btn-text"><b>Login with facebook</b></span>
            </div>
            </a>
        </div> --}}

    </form>
</div>

@include('auth.forgot-password')

<script src="/js/googleLoginButton.js"></script>
@endsection