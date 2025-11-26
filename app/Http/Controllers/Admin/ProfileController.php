<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the profile edit form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile.edit', [
            'user' => $request->user()
        ]);
    }

    /**
     * Update the profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        return $this->handleUpdate(
            fn() => $user->update($validated),
            'profile',
            'admin.profile.edit'
        );
    }

    /**
     * Update the password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        return $this->handleUpdate(
            fn() => $request->user()->update([
                'password' => Hash::make($validated['password'])
            ]),
            'password',
            'admin.profile.edit'
        );
    }
}
