<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MealController extends Controller
{
    public function index(): View
    {
        $meals = Meal::with('category')->latest()->get();

        return view('admin.meals.index', compact('meals'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.meals.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'calories' => ['required', 'integer'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        Meal::create($validated);

        return redirect()
            ->route('meals.index')
            ->with('success', 'Meal created successfully.');
    }

    public function edit(Meal $meal): View
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.meals.edit', compact('meal', 'categories'));
    }

    public function update(Request $request, Meal $meal): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'calories' => ['required', 'integer'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $meal->update($validated);

        return redirect()
            ->route('meals.index')
            ->with('success', 'Meal updated successfully.');
    }

    public function destroy(Meal $meal): RedirectResponse
    {
        $meal->delete();

        return redirect()
            ->route('meals.index')
            ->with('success', 'Meal deleted successfully.');
    }
}
