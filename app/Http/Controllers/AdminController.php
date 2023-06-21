<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::query();

        if (request('admin')) {
            $users->where('is_admin', 1);
        }

        if (\request('trainer')) {
            $users->where('is_trainer', 1);
        }

        if (\request('writer')) {
            $users->where('is_writer', 1);
        }

        if ($keyword = \request('search')) {
            if (strtolower($keyword) === 'male') {
                $users->where('gender', 1);
            }

            if (strtolower($keyword) == 'female') {
                $users->where('gender', 0);
            }

            $users->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%")
                ->orWhere('age', "%{$keyword}%");
        }

        $users = $users->latest()->paginate(20);
        return view('admin.user.users', compact('users'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        alert('', 'User Deleted!', 'success');
        return back();
    }

    public function editUser(User $user)
    {
        return view('admin.user.editUser', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

        ]);
    }

    public function classes()
    {
        return view('admin.classes');
    }
}
