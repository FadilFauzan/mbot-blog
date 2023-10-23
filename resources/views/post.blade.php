@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-9 bg-white p-4 rounded">
                <h2 class="mb-3">{{ $post->title }}</h2>
                <small class="text-muted">
                    <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in
                        <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
                        {{ $post->created_at->diffForHumans() }}
                    </p>
                </small>

                @if ($post->image)
                    <div style="max-height: 350px; overflow: hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3" alt="">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x600/?/{{ $post->category->name }}" class="img-fluid" alt="">
                @endif

                <article>
                    <p>{!! $post->body !!}</p>
                </article>
                <a href="/posts">Kembali ke Halaman Blog</a>

                @include('partials.disqus')
            </div>
        </div>
    </div>


@endsection
