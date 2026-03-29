<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MenuSettingController extends Controller
{
    public function edit(): View
    {
        $menuSetting = MenuSetting::query()->firstOrCreate([]);

        return view('admin.menu-settings.edit', compact('menuSetting'));
    }

    public function update(Request $request): RedirectResponse
    {
        $menuSetting = MenuSetting::query()->firstOrCreate([]);

        $validated = $request->validate([
            'menu_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'whatsapp_number' => ['nullable', 'string', 'max:20'],
        ]);

        if (! empty($validated['whatsapp_number'])) {
            $validated['whatsapp_number'] = preg_replace('/\D+/', '', $validated['whatsapp_number']);
        }

        if ($request->hasFile('menu_logo')) {
            if ($menuSetting->menu_logo) {
                Storage::disk('public')->delete($menuSetting->menu_logo);
            }

            $validated['menu_logo'] = $request->file('menu_logo')->store('menu', 'public');
        }

        $menuSetting->update($validated);

        return redirect()
            ->route('menu-settings.edit')
            ->with('success', 'تم تحديث إعدادات القائمة بنجاح.');
    }
}
