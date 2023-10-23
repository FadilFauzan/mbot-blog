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
            <h2>Welcome, {{ auth()->user()->name }}</h2>
            <div class="content">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <p>Here's some information about your account:</p>
                        <ul>
                            <li>Email : {{ auth()->user()->email }}</li>
                            <li>Role : {{ auth()->user()->is_admin == 1 ? 'Administrator' : 'User' }}</li>
                            <li>Last Login : September 23, 2023 10:30 AM</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <img src="https://th.bing.com/th/id/R.35764bd1f5d8b1666e117e5d16e7d988?rik=Tjrj5MvcxuzZpA&riu=http%3a%2f%2fwww.pngall.com%2fwp-content%2fuploads%2f2017%2f05%2fCommunication-PNG-File.png&ehk=Vz%2fDLe%2fLr4XktZhciNBVQwjELUncCg8Hc4PslOPExSg%3d&risl=&pid=ImgRaw&r=0" class="image-fluid w-100">
                    </div>
                </div>
                {{-- <a href="/dashboard/profile">
                    <button class="btn btn-outline-light mt-4" type="button">Edit Profile</button>
                </a> --}}
            </div>
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
