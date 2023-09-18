@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>

            <a href="/dashboard/posts" class="text-decoration-none">
                <button class="btn btn-success">
                    <span data-feather="arrow-left"></span> Back to All My Post
                </button>
            </a>

            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger " onclick="return confirm('Are you sure?')">
                    <span data-feather="x-circle"></span> Delete
                </button>
            </form>

            @if ($post->image)
                <div style="max-height: 350px; overflow: hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3" alt="">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x600/?/{{ $post->category->name }}" class="img-fluid mt-3" alt="">
            @endif

            <article>
                <p>{!! $post->body !!}</p>
            </article>

            @include('partials.disqus')
        </div>
    </div>
</div>
@endsection