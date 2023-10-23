@extends('layouts.main')

@section('container')

<header class="bg-dark text-white text-center p-5 rounded">
    <div class="container">
        <div class="row">
            <div class="col-md-4 py-3">
                <!-- Avatar Placeholder -->
                <img src="/img/PP.jpg" alt="Your Avatar" class="img-fluid rounded-circle" style="width: 210px;">
            </div>
            <div class="col-md-8">
                <h1>Hello, I'm {{ $name }}</h1>
                <p>Saya {{ $name }}, seorang pengembang perangkat lunak dengan ketertarikan mendalam dalam teknologi dan pemrograman. Saya percaya bahwa kode adalah alat yang kuat untuk menciptakan perubahan positif di dunia.
                    Di luar pekerjaan, saya menemukan kesenangan dalam seni menggambar. Aktivitas ini memberi saya cara untuk beristirahat dari teknologi sambil menjelajahi imajinasi dan kreativitas.
                    Saya senang terus belajar dan berkolaborasi dengan individu yang bersemangat tentang teknologi dan seni. Saya berkomitmen untuk terus mengembangkan keterampilan saya dalam kedua bidang ini.
                    </p>
            </div>
        </div>
    </div>
</header>

<main class="container my-4">
    <section class="row bg-dark p-4 rounded">
        <div class="col-md-6">
            <!-- Kontak Form -->
            <h2 class="text-white">Contact Me</h2>
            <form action="#" method="post">
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
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                        placeholder="name" autofocus required/>
                    <label for="name">Name</label>
                </div>
                
                <div class="mb-3">
                    <label for="message" class="form-label text-white">Message:</label>
                    <textarea id="message" name="message" rows="4" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
        <div class="col-md-6 py-3">
            <img src="{{ asset("img/Multimedia-PNG-Image-File.png") }}" class="image-fluid w-100">
        </div>
    </section>
</main>

@endsection