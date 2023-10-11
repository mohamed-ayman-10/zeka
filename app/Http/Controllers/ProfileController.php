<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $admin = auth('admin')->user();
        return view('pages.profile.index', compact('admin'));
    }

    public function update(Request $request) {
        $admin_id = auth('admin')->user()->id;
        $request->validate([
            'name' => 'required|min:3|string',
            'username' => 'required|min:4|string|unique:admins,username,' . $admin_id,
            'email' => 'required|min:4|string|unique:admins,email,' . $admin_id,
            'password' => 'nullable|min:6|string|confirmed'
        ]);

        $admin = Admin::query()->findOrFail($admin_id);
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = bcrypt($request->password);
        }
        $admin->save();
        toastr()->success('Profile Successfully Updated');
        return back();
    }
}
