@extends('admin.layouts.app')

@section('title', 'Edit Meal')
@section('page_title', 'Edit Meal')
@section('page_subtitle', 'Update meal details, category, price, and calories')

@section('header_actions')
    <a href="{{ route('meals.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-right"></i>
        Back to Meals
    </a>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="page-card">
                <div class="card-header">Meal Information</div>
                <div class="card-body p-4">
                    <form action="{{ route('meals.update', $meal) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control form-control-lg"
                                value="{{ old('name', $meal->name) }}"
                                required
                            >
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label fw-semibold">Price</label>
                                <input
                                    type="number"
                                    id="price"
                                    name="price"
                                    class="form-control"
                                    step="0.01"
                                    min="0"
                                    value="{{ old('price', $meal->price) }}"
                                    required
                                >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="calories" class="form-label fw-semibold">Calories</label>
                                <input
                                    type="number"
                                    id="calories"
                                    name="calories"
                                    class="form-control"
                                    min="0"
                                    value="{{ old('calories', $meal->calories) }}"
                                    required
                                >
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="form-label fw-semibold">Category</label>
                            <select id="category_id" name="category_id" class="form-select" required>
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $meal->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check2-circle"></i>
                            Update Meal
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
