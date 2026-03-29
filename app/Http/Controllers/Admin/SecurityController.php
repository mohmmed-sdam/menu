<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class SecurityController extends Controller
{
    public function editPassword(): View
    {
        return view('admin.security.change-password');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'string', 'max:255'],
            'new_password' => ['required', 'string', 'min:6', 'max:255', 'confirmed'],
        ]);

        $menuSetting = MenuSetting::query()->firstOrCreate([]);

        $configuredPassword = $menuSetting->admin_password ?: (string) env('ADMIN_PASSWORD', '');
        if ($configuredPassword === '') {
            return back()->withErrors(['current_password' => 'Admin password is not configured.']);
        }

        $currentInput = $validated['current_password'];
        $isHashedPassword = str_starts_with($configuredPassword, '$2y$') || str_starts_with($configuredPassword, '$argon2');
        $currentMatches = $isHashedPassword
            ? Hash::check($currentInput, $configuredPassword)
            : hash_equals($configuredPassword, $currentInput);

        if (! $currentMatches) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $menuSetting->update([
            'admin_password' => Hash::make($validated['new_password']),
        ]);

        return back()->with('success', 'Admin password updated successfully.');
    }
}