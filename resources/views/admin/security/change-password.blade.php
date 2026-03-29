@extends('admin.layouts.app')

@section('title', 'Change Password')
@section('page_title', 'Change Admin Password')
@section('page_subtitle', 'Update dashboard login password securely')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="page-card">
                <div class="card-header">Password Settings</div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.password.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label fw-semibold">Current Password</label>
                            <input type="password" id="current_password" name="current_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label fw-semibold">New Password</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="new_password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-shield-lock"></i>
                            Update Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
