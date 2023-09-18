@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                    id="title" name="title" value="{{ old('title', $post->title) }}" required autofocus >
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                    id="slug" name="slug" value="{{ old('slug', $post->slug) }}" required>
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    @if (old('category_id', $post->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}"> 

            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}"
                    class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif

            <input class="form-control @error('image') is-invalid @enderror"
                type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <input type="hidden" id="body" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mb-5">Update Post</button>
        </div>
    </form>
</div>

@endsection