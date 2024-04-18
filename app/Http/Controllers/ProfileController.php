<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request , $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'domaine' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'identifiscal' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user->update($validatedData);

        return redirect()->route('profile.edit', $user->id)->with('success', 'Profile updated successfully.');
    }
}
