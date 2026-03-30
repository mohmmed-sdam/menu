@extends('admin.layouts.app')

@section('title', 'تغيير كلمة المرور')
@section('page_title', 'تغيير كلمة المرور')
@section('page_subtitle', 'تحديث كلمة مرور دخول لوحة التحكم بشكل آمن')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="page-card">
                <div class="card-header">إعدادات كلمة المرور</div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.password.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label fw-semibold">كلمة المرور الحالية</label>
                            <input type="password" id="current_password" name="current_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label fw-semibold">كلمة المرور الجديدة</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="new_password_confirmation" class="form-label fw-semibold">تأكيد كلمة المرور الجديدة</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-shield-lock"></i>
                            تحديث كلمة المرور
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
