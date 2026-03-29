<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(Request $request): View|RedirectResponse
    {
        if ($request->session()->get('admin_authenticated', false)) {
            return redirect()->route('categories.index');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'phone' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        $configuredPhone = preg_replace('/\D+/', '', (string) env('ADMIN_PHONE', ''));
        $menuSetting = MenuSetting::query()->first();
        $configuredPassword = (string) ($menuSetting?->admin_password ?: env('ADMIN_PASSWORD', ''));

        if ($configuredPhone === '' || $configuredPassword === '') {
            return back()
                ->withInput()
                ->withErrors(['phone' => 'Admin credentials are not configured in .env']);
        }

        $incomingPhone = preg_replace('/\D+/', '', $validated['phone']);
        $incomingPassword = $validated['password'];

        $isHashedPassword = str_starts_with($configuredPassword, '$2y$') || str_starts_with($configuredPassword, '$argon2');
        $passwordMatches = $isHashedPassword
            ? Hash::check($incomingPassword, $configuredPassword)
            : hash_equals($configuredPassword, $incomingPassword);

        if ($incomingPhone !== $configuredPhone || ! $passwordMatches) {
            return back()
                ->withInput()
                ->withErrors(['phone' => 'Invalid phone number or password']);
        }

        $request->session()->regenerate();
        $request->session()->put('admin_authenticated', true);
        $request->session()->put('admin_phone', $incomingPhone);

        return redirect()->intended(route('categories.index'));
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget(['admin_authenticated', 'admin_phone']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}