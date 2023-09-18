<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function index() {

        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'in ' . $category->name;
        } else if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = 'by. ' . $author->name;
        }

        return view('posts', [
            'title' => 'All Post ' . $title,
            'active' => 'posts',
            // 'posts' => Post::all()
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            'title' => 'Single Post',
            'active' => 'posts',
            'post' => $post
        ]);
    }

    public function author(User $author) {
        return view('posts', [
            'active' => 'posts',
            'posts' => $author->posts->load(['category', 'author']) // Debug n+1 problem (lazy eager load)
        ]);
    }
}
