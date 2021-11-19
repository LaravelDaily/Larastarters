<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return Inertia::render('Auth/Profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
