{{-- @dd($posts) --}}
@extends('layouts.main')

@section('container')
<div class="p-3 p-lg-5 mb-4 rounded " style="background-color: aliceblue;">
    <h2 class="mb-4 text-center">{{ $title }}</h2>

    <div class="row justify-content-center">
        <div class="col-md-6 mb-3 "> 
            <form action="/posts">

                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            <a href="/post/{{ $posts[0]->slug }}">

            @if ($posts[0]->image)
                <div style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid mt-3" alt="">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400/?/{{ $posts[0]->category->name }}" class="card-img-top" alt="">
            @endif
            
            </a>
            <div class="card-body text-center">
                <h5 class="card-title">
                    <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
                </h5>
                <p class="card-text text-center">
                    <small class="text-muted">
                        By. <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in
                            <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                            {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text text-center">{{ $posts[0]->excerpt }}</p>
                <a href="/post/{{ $posts[0]->slug }}" class="btn btn-secondary mt-3">Read more</a>
            </div>
        </div>

        <div class="container">
            <div class="row">

            @foreach ($posts->skip(1) as $post)
                <div class="col-sm-6 col-lg-4 col-6 mb-3 p-1 p-lg-2">
                    <div class="card">
                        <a href="/posts?category={{ $post->category->slug }}" class="position-absolute px-3 py-2 text-decoration-none text-white rounded" style="background-color: rgba(0, 0, 0, 0.7)">
                            {{ $post->category->name }}
                        </a>

                        @if ($post->image)
                            <div style="max-height: 310px; overflow: hidden">
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/500x400/?/{{ $post->category->name }}" class="card-img img-fluid" alt="...">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/post/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                            </h5>
                            <p class="card-text">
                                <small class="text-muted">
                                    By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text">{{ Str::limit(strip_tags($post->body, 200)) }} </p>
                            <a href="/post/{{ $post->slug }}" class="btn btn-secondary mt-3">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    @else
        <p class="text-center fs-4">No Post Found.</p>
    @endif

    {{-- pagination --}}
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection