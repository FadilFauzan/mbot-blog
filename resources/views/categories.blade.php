{{-- @dd($posts) --}}
@extends('layouts.main')

@section('container')
    <h2 class="mb-4 text-white">Post Categories</h2>

        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4">
                        <a href="/posts?category={{ $category->slug }}" class="text-white text-decoration-none">
                            <div class="card mb-3">
                                <img src="https://source.unsplash.com/1000x700/?/{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                                <div class="card-img-overlay d-flex align-items-center p-0">
                                    <h5 class="card-title text-center flex-fill p-3 " style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</a></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
@endsection


{{-- 
    Post::create([
    "title" => "Judul Pertama",
    "category_id" => 1,
    "slug" => "judul-pertama",
    "author" => "Ukasa Al Uqelli",
    "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem similique quae magni cum facilis, nulla, quia accusamus labore porro maiores harum minus! Optio asperiores ",
    "body" => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem similique quae magni cum facilis, nulla, itaque aut impedit recusandae a, voluptatibus numquam repellendus incidunt consequuntur</p>
    <p>quia accusamus labore porro maiores harum minus! Optio asperiores voluptas, quo ipsam ut quisquam in quasi, itaque laborum alias commodi consectetur voluptatem. Ab impedit a, nihil quam inventore reprehenderit earum pariatur beatae ipsum quis ea amet molestiae similique fugiat mollitia odit in necessitatibus tenetur? Voluptas minima tempora soluta labore, explicabo pariatur earum possimus repellendus est.</p>"
    ])
    
    Category::create([
    "name" => "Personal",
    "slug" => "personal",
    ]) 
--}}
