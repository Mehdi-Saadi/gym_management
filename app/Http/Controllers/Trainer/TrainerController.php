<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TrainerController extends Controller
{

    public function profile()
    {
        $user = auth()->user();
        return view('trainer.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        return view('trainer.editProfile', compact('user'));
    }

    public function updateProfile(Request $request, User $user)
    {
        // make sure authenticated user just can change his/her profile
        if ($user->id !== auth()->user()->id) {
            alert('', 'Ids does not match!', 'error');
            return back();
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'age' => ['required', 'numeric', 'max:100', 'min:10'],
            'experience' => ['required', 'numeric', 'max:100'],
            'info' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'twitter' => ['nullable', 'string', 'max:255'],
            'facebook' => ['nullable', 'string', 'max:255'],
            'youtube' => ['nullable', 'string', 'max:255'],
        ]);

        // if user changed pass
        if (! is_null($request->password)) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $data['password'] = $request->password;
        }

        // if user uploaded a file
        if (! is_null($request->file('photo'))) {
            $request->validate([
                'photo' => 'required|image',
            ]);

            $file = $request->file('photo');
            $file->move(public_path('profile_imgs'), $data['photo_name'] = $user->id . '.' . $file->getClientOriginalExtension());
        }

        $user->update($data);

        alert('', 'Profile Changed!', 'success');
        return to_route('trainer.profile');
    }
}
