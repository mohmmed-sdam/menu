@extends('admin.layouts.app')

@section('title', 'Categories')
@section('page_title', 'Categories')
@section('page_subtitle', 'Manage menu categories and their images')

@section('header_actions')
    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i>
        Add Category
    </a>
@endsection

@section('content')
    <div class="page-card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <span>All Categories</span>
            <span class="metric-badge">{{ $categories->count() }} items</span>
        </div>
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                <tr>
                    <th style="width: 90px;">ID</th>
                    <th style="width: 110px;">Image</th>
                    <th>Name</th>
                    <th style="width: 210px;">Created At</th>
                    <th style="width: 190px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>#{{ $category->id }}</td>
                        <td>
                            @if ($category->image)
                                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="thumb">
                            @else
                                <span class="text-muted small">No image</span>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $category->name }}</td>
                        <td>{{ $category->created_at?->format('Y-m-d H:i') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                    Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category? This will delete its meals too.');">
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
                        <td colspan="5" class="text-center py-4 text-muted">No categories found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
