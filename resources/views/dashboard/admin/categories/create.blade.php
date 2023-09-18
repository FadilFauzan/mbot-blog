@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/admin/categories" method="post" enctype="multipart/form-data">
        @csrf
        @foreach(['name' => 'Category Name', 'slug' => 'Slug'] as $newCategory => $label)
            <div class="mb-3">
                <label for="{{ $newCategory }}" class="form-label">{{ $label }}</label>
                <input type="text" class="form-control @error($newCategory) is-invalid @enderror"
                    id="{{ $newCategory }}" name="{{ $newCategory }}" value="{{ old($newCategory) }}" autofocus required>
                @error($newCategory)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endforeach        

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mb-5">Create Category</button>
        </div>
    </form>
</div>

@endsection
