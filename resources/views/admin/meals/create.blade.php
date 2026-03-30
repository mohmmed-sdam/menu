@extends('admin.layouts.app')

@section('title', 'إضافة وجبة')
@section('page_title', 'إضافة وجبة')
@section('page_subtitle', 'إضافة وجبة مع القسم والسعر والسعرات')

@section('header_actions')
    <a href="{{ route('meals.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-right"></i>
        العودة إلى الوجبات
    </a>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="page-card">
                <div class="card-header">بيانات الوجبة</div>
                <div class="card-body p-4">
                    <form action="{{ route('meals.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">اسم الوجبة</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control form-control-lg"
                                value="{{ old('name') }}"
                                placeholder="اكتب اسم الوجبة"
                                required
                            >
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label fw-semibold">السعر</label>
                                <input
                                    type="number"
                                    id="price"
                                    name="price"
                                    class="form-control"
                                    step="0.01"
                                    min="0"
                                    value="{{ old('price') }}"
                                    required
                                >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="calories" class="form-label fw-semibold">السعرات</label>
                                <input
                                    type="number"
                                    id="calories"
                                    name="calories"
                                    class="form-control"
                                    min="0"
                                    value="{{ old('calories') }}"
                                    required
                                >
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="form-label fw-semibold">القسم</label>
                            <select id="category_id" name="category_id" class="form-select" required>
                                <option value="">اختر قسمًا</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check2-circle"></i>
                            حفظ الوجبة
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
