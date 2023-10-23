@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center">
    <form action="/register" method="post" class="uniqcustom col-12 col-lg-6 col-md-6 col-xl-5">
        @csrf
        <h1 class="text-center mb-4">Registration Form</h1>

        <!-- Name input -->
        <div class="form-floating mb-2">
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                placeholder="Name" value="{{ old('name') }}" autofocus required/>
            <label for="name">Name</label>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Username input -->
        <div class="form-floating mb-2">
            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" 
                placeholder="username" value="{{ old('username') }}" autofocus required/>
            <label for="username">Username</label>
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password input -->
        <div class="form-floating mb-2">
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                placeholder="Email Address" value="{{ old('email') }}"autofocus required/>
            <label for="email">Email Address</label>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password input -->
        <div class="form-floating mb-4">
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                placeholder="Password" autofocus required/>
            <label for="password">Password</label>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Submit button -->
        <div class="d-flex justify-content-end">
            <button type="submit" name="register" class="btn btn-secondary mb-4">Register</button>
        </div>

        <!-- Login buttons -->
        <div class="text-center">
            <p>Already registered? <a href="/login">Login</a></p>
        </div>

    </form>
</div>
@endsection