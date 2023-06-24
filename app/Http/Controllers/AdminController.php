<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::where('is_admin', 0)->where('is_trainer', 0)->where('is_writer', 0)->count();
        $trainers = User::where('is_trainer', 1)->count();
        $writers = User::where('is_writer', 1)->count();
        $classes = Course::all()->count();

        return view('admin.dashboard', [
            'users' => $users,
            'trainers' => $trainers,
            'writers' => $writers,
            'classes' => $classes,
        ]);
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
            $users->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%")
                ->orWhere('age', $keyword);
            if (strtolower($keyword) === 'male') {
                $users->orWhere('gender', 1);
            }

            if (strtolower($keyword) == 'female') {
                $users->orWhere('gender', 0);
            }
        }

        $users = $users->orderBy('name')->paginate(20);
        return view('admin.user.users', compact('users'));
    }

    public function deleteUser(User $user)
    {
        // delete profile photo if exists
        if (File::exists(public_path('profile_imgs\\' . $user->photo_name))) {
            File::delete(public_path('profile_imgs\\' . $user->photo_name));
        }

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
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'age' => ['required', 'numeric', 'max:100', 'min:10'],
            'gender' => ['required', Rule::in(['1', '0'])]
        ]);

        if (! is_null($request->password)) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $data['password'] = $request->password;
        }

        if (! is_null($request->file('photo'))) {
            $request->validate([
                'photo' => 'required|image',
            ]);

            $file = $request->file('photo');
            $file->move(public_path('profile_imgs'), $data['photo_name'] = $user->id . '.' . $file->getClientOriginalExtension());
        }

        // set permissions
        if (is_null($request->admin)) {
            $data['is_admin'] = 0;
        } else {
            $data['is_admin'] = 1;
        }

        if (is_null($request->trainer)) {
            $data['is_trainer'] = 0;
        } else {
            $data['is_trainer'] = 1;
        }

        if (is_null($request->writer)) {
            $data['is_writer'] = 0;
        } else {
            $data['is_writer'] = 1;
        }

        $user->update($data);

        alert('', 'User Changed!', 'success');
        return to_route('admin.users');
    }
}
