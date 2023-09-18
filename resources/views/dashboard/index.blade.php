@extends('dashboard.layouts.main')

@section('container')
    @if (session('login'))
    <div class="alert alert-success alert-dismissible fade show"  id="success-alert" role="alert">
        {{ session('login') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    
    <div class="row align-items-md-stretch">
        <div class="h-100 p-5 text-white bg-dark rounded-3 col-lg-8 mb-3">
            <h2>Hallo, {{ auth()->user()->name }}</h2>
            <p>{{ auth()->user()->username }}</p>
            <button class="btn btn-outline-light" type="button">Example button</button>
        </div>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <p>If you log in using Google, your default password is "password", immediately change your password for further security</p>
    <div>
        <button type="button" name="change_password" class="btn btn-primary mb-3 col"
            data-bs-toggle="modal" data-bs-target="#formModal">Change Password
        </button>
    </div>

    @include('auth.change-password')

    <script>
        // Menggunakan jQuery untuk menyembunyikan pesan alert setelah 5 detik
        setTimeout(function(){
            $("#success-alert").fadeOut(500);
        }, 5000); // 5000 milidetik (5 detik)
    </script>
@endsection
