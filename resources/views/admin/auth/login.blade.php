<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول للإدارة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at top, #1f2937 0%, #111827 45%, #0b1220 100%);
            font-family: "Segoe UI", Tahoma, sans-serif;
            padding: 1rem;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border: 0;
            border-radius: 14px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.35);
        }
    </style>
</head>
<body>
<div class="card login-card">
    <div class="card-body p-4">
        <h1 class="h4 mb-1">تسجيل الدخول للإدارة</h1>
        <p class="text-muted mb-4">أدخل رقم الجوال وكلمة المرور للوصول إلى لوحة التحكم.</p>

        @if ($errors->any())
            <div class="alert alert-danger py-2">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="phone" class="form-label">رقم الجوال</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="9665XXXXXXXX" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">دخول</button>
        </form>
    </div>
</div>
</body>
</html>
