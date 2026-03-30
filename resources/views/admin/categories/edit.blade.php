@extends('admin.layouts.app')

@section('title', 'تعديل قسم')
@section('page_title', 'تعديل قسم')
@section('page_subtitle', 'تحديث بيانات القسم وصورته')

@section('header_actions')
    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-right"></i>
        العودة إلى الأقسام
    </a>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="page-card">
                <div class="card-header">بيانات القسم</div>
                <div class="card-body p-4">
                    <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">اسم القسم</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control form-control-lg"
                                value="{{ old('name', $category->name) }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label fw-semibold">صورة القسم - اختياري</label>
                            <input
                                type="file"
                                id="image"
                                name="image"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp"
                            >
                            <small class="text-muted">المسموح: JPG وPNG وWEBP. الحد الأقصى: 2MB.</small>
                        </div>

                        @if ($category->image)
                            <div class="mb-4">
                                <p class="mb-2 fw-semibold">الصورة الحالية</p>
                                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="thumb">
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check2-circle"></i>
                            تحديث القسم
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
