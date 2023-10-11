<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->orderBy('id', 'DESC')->paginate(PAGINATION);
        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $validatedData['image'] = uploadFile('uploads/users', $request->file('image'));
        }
        User::query()->create($validatedData);
        toastr()->success('User Added Successfully');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            deleteFile($user->image);
            $validatedData['image'] = uploadFile('uploads/users', $request->file('image'));
        }
        if ($request->password) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            $validatedData['password'] = $user->password;
        }
        $user->update($validatedData);
        toastr()->success('User Updated Successfully');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        deleteFile($user->image);
        $user->delete();
        toastr()->success('User Deleted Successfully');
        return back();
    }

    public function search(Request $request)
    {
        $users = User::where('first_name', 'like', '%' . $request->search_string . '%')
            ->orWhere('last_name', 'like', '%' . $request->search_string . '%')
            ->orWhere('email', 'like', '%' . $request->search_string . '%')
            ->orWhere('phone', 'like', '%' . $request->search_string . '%')
            ->orWhere('address', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')
            ->paginate(PAGINATION);




        if ($users->count() >= 1) {
            return view('pages.users.search_users', compact('users'))->render();
        } else {
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }
}
