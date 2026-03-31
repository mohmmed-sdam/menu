<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'لوحة التحكم')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --admin-bg: #f3f5f9;
            --sidebar-bg: #111827;
            --sidebar-muted: #a9b2c7;
            --sidebar-active: #2563eb;
            --card-border: #e9eef5;
            --text-main: #0f172a;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: var(--admin-bg);
            color: var(--text-main);
        }

        .admin-shell {
            display: flex;
            min-height: 100vh;
        }

        .admin-sidebar {
            width: 260px;
            background: linear-gradient(180deg, #0f172a 0%, var(--sidebar-bg) 100%);
            color: #fff;
            padding: 1.25rem 1rem;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: .65rem;
            margin-bottom: 1.4rem;
            padding: .35rem .5rem;
        }

        .brand-badge {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .brand-title {
            font-size: 1rem;
            font-weight: 700;
            margin: 0;
        }

        .brand-sub {
            font-size: .75rem;
            color: var(--sidebar-muted);
        }

        .nav-section-title {
            font-size: .74rem;
            color: var(--sidebar-muted);
            text-transform: uppercase;
            letter-spacing: .7px;
            margin: 1.2rem .6rem .55rem;
        }

        .admin-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .admin-nav a {
            display: flex;
            align-items: center;
            gap: .65rem;
            color: #e5e7eb;
            text-decoration: none;
            padding: .68rem .75rem;
            border-radius: 10px;
            font-size: .94rem;
            margin-bottom: .28rem;
            transition: .18s ease;
        }

        .admin-nav a:hover {
            background: rgba(255, 255, 255, .06);
            color: #fff;
        }

        .admin-nav a.active {
            background: var(--sidebar-active);
            color: #fff;
            box-shadow: 0 8px 18px rgba(37, 99, 235, .3);
        }

        .admin-content {
            flex: 1;
            min-width: 0;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: .5rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .topbar {
            background: #fff;
            border-bottom: 1px solid #e8edf5;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .topbar-title {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 700;
        }

        .topbar-subtitle {
            color: #64748b;
            font-size: .85rem;
            margin-top: .2rem;
        }

        .content-wrap {
            padding: 1.2rem 1.5rem 1.8rem;
        }

        .page-card {
            background: #fff;
            border: 1px solid var(--card-border);
            border-radius: 14px;
            box-shadow: 0 10px 26px rgba(15, 23, 42, .05);
        }

        .page-card .card-header {
            background: transparent;
            border-bottom: 1px solid var(--card-border);
            font-weight: 600;
            padding: .95rem 1.15rem;
        }

        .admin-footer {
            margin-top: 1.25rem;
            padding: 1rem 0 .2rem;
            border-top: 1px solid #e5eaf2;
            text-align: center;
            color: #64748b;
            font-size: .9rem;
        }

        .admin-footer strong {
            color: #0f172a;
        }

        .admin-footer a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 700;
        }

        .admin-footer a:hover {
            color: #1d4ed8;
        }

        .admin-footer-contacts {
            margin-top: .65rem;
            display: flex;
            flex-direction: column;
            gap: .45rem;
            align-items: center;
        }

        .admin-footer-contacts a {
            direction: ltr;
            unicode-bidi: isolate;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 220px;
            padding: .55rem 1rem;
            border: 1px solid #d8e2f0;
            border-radius: 999px;
            background: #f8fbff;
        }

        .table-modern thead th {
            font-size: .8rem;
            text-transform: uppercase;
            letter-spacing: .45px;
            color: #64748b;
            background: #f8fafc;
            border-bottom: 1px solid #eaf0f7;
        }

        .table-modern td,
        .table-modern th {
            vertical-align: middle;
            padding: .85rem .95rem;
        }

        .thumb {
            width: 54px;
            height: 54px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .metric-badge {
            background: #eef2ff;
            color: #3730a3;
            font-weight: 600;
            border-radius: 999px;
            padding: .2rem .65rem;
            font-size: .8rem;
            display: inline-block;
        }

        .table-responsive {
            -webkit-overflow-scrolling: touch;
        }

        .table-responsive .btn,
        .table-responsive .btn-sm {
            white-space: nowrap;
        }

        @media (max-width: 992px) {
            .admin-shell {
                flex-direction: column;
            }

            .admin-sidebar {
                width: 100%;
                height: auto;
                position: static;
                padding: 1rem .85rem;
                border-bottom: 1px solid rgba(255, 255, 255, .06);
            }

            .brand {
                margin-bottom: .9rem;
            }

            .nav-section-title {
                margin: 0 0 .55rem;
            }

            .admin-nav {
                display: flex;
                gap: .6rem;
                overflow-x: auto;
                padding-bottom: .3rem;
                scrollbar-width: thin;
            }

            .admin-nav li {
                flex: 0 0 auto;
            }

            .admin-nav a {
                margin-bottom: 0;
                white-space: nowrap;
            }

            .content-wrap,
            .topbar {
                padding: 1rem;
            }

            .topbar {
                gap: .9rem;
                align-items: flex-start;
                flex-wrap: wrap;
            }

            .topbar-title {
                font-size: 1rem;
            }

            .topbar-actions {
                width: 100%;
                justify-content: stretch;
            }

            .topbar-actions > * {
                flex: 1 1 100%;
            }

            .topbar-actions .btn,
            .topbar-actions form,
            .topbar-actions form .btn {
                width: 100%;
            }

            .page-card {
                border-radius: 12px;
            }

            .page-card .card-header {
                padding: .9rem 1rem;
            }
        }

        @media (max-width: 576px) {
            .content-wrap {
                padding: .85rem;
            }

            .admin-sidebar {
                padding: .85rem .75rem;
            }

            .brand {
                padding-inline: .25rem;
            }

            .admin-nav a {
                padding: .62rem .78rem;
                font-size: .88rem;
            }

            .topbar {
                padding: .85rem;
            }

            .topbar-subtitle {
                font-size: .8rem;
            }

            .page-card .card-body {
                padding: 1rem !important;
            }

            .table-modern td,
            .table-modern th {
                padding: .75rem .7rem;
                font-size: .88rem;
            }

            .thumb {
                width: 46px;
                height: 46px;
            }

            .alert {
                padding: .85rem .95rem;
                font-size: .92rem;
            }

            .btn {
                min-height: 42px;
            }

            .form-control,
            .form-select {
                min-height: 44px;
                font-size: 16px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="admin-shell">
    <aside class="admin-sidebar">
        <div class="brand">
            <div class="brand-badge"><i class="bi bi-shop"></i></div>
            <div>
                <p class="brand-title">لوحة التحكم</p>
                <div class="brand-sub">إدارة المنيو</div>
            </div>
        </div>

        <div class="nav-section-title">التنقل</div>
        <ul class="admin-nav">
            <li>
                <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <i class="bi bi-grid-3x3-gap"></i>
                    <span>الأقسام</span>
                </a>
            </li>
            <li>
                <a href="{{ route('meals.index') }}" class="{{ request()->routeIs('meals.*') ? 'active' : '' }}">
                    <i class="bi bi-cup-hot"></i>
                    <span>الوجبات</span>
                </a>
            </li>
            <li>
                <a href="{{ route('menu-settings.edit') }}" class="{{ request()->routeIs('menu-settings.*') ? 'active' : '' }}">
                    <i class="bi bi-image"></i>
                    <span>شعار المنيو</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.password.edit') }}" class="{{ request()->routeIs('admin.password.*') ? 'active' : '' }}">
                    <i class="bi bi-shield-lock"></i>
                    <span>تغيير كلمة المرور</span>
                </a>
            </li>
            <li>
                <a href="{{ route('public.menu') }}" target="_blank">
                    <i class="bi bi-box-arrow-up-right"></i>
                    <span>عرض المنيو</span>
                </a>
            </li>
        </ul>
    </aside>

    <main class="admin-content">
        <header class="topbar">
            <div>
                <h1 class="topbar-title">@yield('page_title', 'الرئيسية')</h1>
                <div class="topbar-subtitle">@yield('page_subtitle', 'إدارة المنيو والإعدادات')</div>
            </div>
            <div class='topbar-actions'>
                @yield('header_actions')
                <form method='POST' action='{{ route('admin.logout') }}' class='m-0'>
                    @csrf
                    <button type='submit' class='btn btn-outline-danger btn-sm'>
                        <i class='bi bi-box-arrow-right'></i>
                        تسجيل الخروج
                    </button>
                </form>
            </div>
        </header>

        <div class="content-wrap">
            @if (session('success'))
                <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger border-0 shadow-sm">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

            <footer class="admin-footer">
                <div>&copy; 2026 جميع الحقوق محفوظة</div>
                <div>
                    <strong>تصميم وتطوير:</strong> شركة IM التقنية
                </div>
                <div class="admin-footer-contacts">
                    <a href="https://wa.me/967776742913" target="_blank" rel="noopener noreferrer">+967 776 742 913</a>
                    <a href="https://wa.me/967777234341" target="_blank" rel="noopener noreferrer">+967 777 234 341</a>
                </div>
            </footer>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>

