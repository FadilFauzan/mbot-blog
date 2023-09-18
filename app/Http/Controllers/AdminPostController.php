<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.admin.posts.index', [
            'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        if (Gate::allows('admin')) {
            return view('dashboard.admin.posts.show', [
                'post' => $post,
            ]);
        } else {
            return redirect('/dashboard/admin/posts')->with('fail', "You don't have permission to access this page!");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        Post::destroy($post->id);

        if ($post->image) {
            Storage::delete($post->image);
        }

        return redirect('/dashboard/admin/posts/')
            ->with('success', 'New post has been deleted');
    }
}
