@extends('admin.layouts.app')

@section('title', 'Meals')
@section('page_title', 'Meals')
@section('page_subtitle', 'Manage menu meals, prices, and calories')

@section('header_actions')
    <a href="{{ route('meals.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i>
        Add Meal
    </a>
@endsection

@section('content')
    <div class="page-card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <span>All Meals</span>
            <span class="metric-badge">{{ $meals->count() }} items</span>
        </div>
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th>Name</th>
                    <th style="width: 220px;">Category</th>
                    <th style="width: 130px;">Price</th>
                    <th style="width: 120px;">Calories</th>
                    <th style="width: 210px;">Created At</th>
                    <th style="width: 190px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($meals as $meal)
                    <tr>
                        <td>#{{ $meal->id }}</td>
                        <td class="fw-semibold">{{ $meal->name }}</td>
                        <td>{{ $meal->category?->name }}</td>
                        <td>${{ number_format($meal->price, 2) }}</td>
                        <td>{{ $meal->calories }}</td>
                        <td>{{ $meal->created_at?->format('Y-m-d H:i') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('meals.edit', $meal) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                    Edit
                                </a>
                                <form action="{{ route('meals.destroy', $meal) }}" method="POST" onsubmit="return confirm('Delete this meal?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash3"></i>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No meals found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
