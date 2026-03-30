@extends('admin.layouts.app')

@section('title', 'إضافة قسم')
@section('page_title', 'إضافة قسم')
@section('page_subtitle', 'إضافة قسم جديد للمنيو مع صورة اختيارية')

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
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">اسم القسم</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control form-control-lg"
                                value="{{ old('name') }}"
                                placeholder="اكتب اسم القسم"
                                required
                            >
                        </div>

                        <div class="mb-4">
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

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check2-circle"></i>
                            حفظ القسم
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
