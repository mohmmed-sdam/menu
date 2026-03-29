@extends('admin.layouts.app')

@section('title', 'Menu Logo Settings')
@section('page_title', 'Menu Logo Settings')
@section('page_subtitle', 'Upload logo and configure WhatsApp orders for the public menu page')

@section('header_actions')
    <a href="{{ url('/menu') }}" class="btn btn-outline-primary" target="_blank">
        <i class="bi bi-box-arrow-up-right"></i>
        Preview Menu
    </a>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="page-card">
                <div class="card-header">Menu Configuration</div>
                <div class="card-body p-4">
                    <form action="{{ route('menu-settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="whatsapp_number" class="form-label fw-semibold">WhatsApp Number</label>
                            <input
                                type="text"
                                class="form-control"
                                id="whatsapp_number"
                                name="whatsapp_number"
                                value="{{ old('whatsapp_number', $menuSetting->whatsapp_number) }}"
                                placeholder="9665XXXXXXXX"
                            >
                            <small class="text-muted">Use international format without symbols. Example: 9665XXXXXXXX</small>
                        </div>

                        <div class="mb-3">
                            <label for="menu_logo" class="form-label fw-semibold">Menu Header Logo</label>
                            <input
                                type="file"
                                class="form-control"
                                id="menu_logo"
                                name="menu_logo"
                                accept=".jpg,.jpeg,.png,.webp"
                            >
                            <small class="text-muted">Allowed: JPG, PNG, WEBP. Maximum size: 2MB.</small>
                        </div>

                        @if ($menuSetting->menu_logo)
                            <div class="mb-4">
                                <p class="mb-2 fw-semibold">Current Header Logo</p>
                                <img
                                    src="{{ Storage::url($menuSetting->menu_logo) }}"
                                    alt="Menu Logo"
                                    style="width: 220px; height: 110px; object-fit: cover; border-radius: 10px; border: 1px solid #e5e7eb;"
                                >
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check2-circle"></i>
                            Save Settings
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
