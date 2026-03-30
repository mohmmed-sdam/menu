@extends('admin.layouts.app')

@section('title', 'إعدادات الشعار والمنيو')
@section('page_title', 'إعدادات الشعار والمنيو')
@section('page_subtitle', 'رفع الشعار وضبط طلبات واتساب في صفحة المنيو')

@section('header_actions')
    <a href="{{ route('public.menu') }}" class="btn btn-outline-primary" target="_blank">
        <i class="bi bi-box-arrow-up-right"></i>
        معاينة المنيو
    </a>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="page-card">
                <div class="card-header">إعدادات المنيو</div>
                <div class="card-body p-4">
                    <form action="{{ route('menu-settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="whatsapp_number" class="form-label fw-semibold">رقم واتساب</label>
                            <input
                                type="text"
                                class="form-control"
                                id="whatsapp_number"
                                name="whatsapp_number"
                                value="{{ old('whatsapp_number', $menuSetting->whatsapp_number) }}"
                                placeholder="9665XXXXXXXX"
                            >
                            <small class="text-muted">استخدم الصيغة الدولية بدون رموز. مثال: 9665XXXXXXXX</small>
                        </div>

                        <div class="mb-3">
                            <label for="menu_logo" class="form-label fw-semibold">شعار أعلى المنيو</label>
                            <input
                                type="file"
                                class="form-control"
                                id="menu_logo"
                                name="menu_logo"
                                accept=".jpg,.jpeg,.png,.webp"
                            >
                            <small class="text-muted">المسموح: JPG وPNG وWEBP. الحد الأقصى: 2MB.</small>
                        </div>

                        @if ($menuSetting->menu_logo)
                            <div class="mb-4">
                                <p class="mb-2 fw-semibold">الشعار الحالي</p>
                                <img
                                    src="{{ Storage::url($menuSetting->menu_logo) }}"
                                    alt="شعار المنيو"
                                    style="width: 220px; height: 110px; object-fit: cover; border-radius: 10px; border: 1px solid #e5e7eb;"
                                >
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check2-circle"></i>
                            حفظ الإعدادات
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
