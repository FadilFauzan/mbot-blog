<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $users =  User::latest()->paginate(7);
        $specialUser = $users->where('username', 'fadil.ahmad.fauzan')->first();
        $admins = $users->where('is_admin', true)->reject(function ($user) {
            return $user->username === 'fadil.ahmad.fauzan';
        })->reverse();
        $guests = $users->where('is_admin', false);

        $this->authorize('admin');
        return view('dashboard.admin.users.index', [
            'sortedUsers' => collect([$specialUser])->concat($admins)->concat($guests),
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
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        $validatedData = $request->validate([
            'is_admin' => 'required'
        ]);

        User::where('id', $user->id)->update($validatedData);

        $user = $user->name;
        return redirect('/dashboard/admin/users')->with('success', $user . ' status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        User::destroy($user->id);

        return redirect('/dashboard/admin/users')
            ->with('success', $user->name . ' has been deleted');
    }
}
