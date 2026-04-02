<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة الطعام</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap');

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .menu-container {
            width: 100%;
            max-width: 1000px;
            background-color: #1a1a1a;
            border: 4px solid #333;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.8);
            border-radius: 8px;
        }

        header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #e67e22;
            padding-bottom: 0;
            overflow: hidden;
        }

        .brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            direction: ltr;
            background: #f1c40f;
            color: #171717;
            padding: 7px 20px 7px 6px;
            font-size: 56px;
            font-weight: 700;
            line-height: 1;
            border-radius: 6px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.35);
            margin-bottom: 7px;
            position: relative;
        }

        .brand-icon {
            width: 58px;
            height: 68px;
            object-fit: contain;
            border: 0;
            background: transparent;
            transform: translate(-15px, 4px);
            box-shadow: none;
            order: 1;
        }

        .brand-title-text {
            direction: rtl;
            display: inline-block;
            transform: translateX(-8px);
            order: 2;
        }

        .subtitle {
            font-size: 41px;
            color: #f3f3f3;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .tax-info {
            color: #f1c40f;
            font-size: 34px;
            font-weight: bold;
        }

        .header-logo {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
            margin-inline: auto;
        }

        .sections-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .sections-nav {
            display: none;
            margin-bottom: 18px;
        }

        .sections-nav-inner {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 4px 2px 10px;
            scrollbar-width: thin;
            scrollbar-color: #595959 #1a1a1a;
        }

        .sections-nav-inner::-webkit-scrollbar {
            height: 8px;
        }

        .sections-nav-inner::-webkit-scrollbar-thumb {
            background: #4a4a4a;
            border-radius: 999px;
        }

        .sections-nav-btn {
            border: 1px solid #4a4a4a;
            background: #202020;
            color: #f3f3f3;
            padding: 10px 16px;
            border-radius: 999px;
            font-family: inherit;
            font-size: 15px;
            font-weight: 700;
            white-space: nowrap;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease;
        }

        .sections-nav-btn.active {
            background: #f1c40f;
            color: #111;
            border-color: #f1c40f;
            transform: translateY(-1px);
        }

        .section {
            margin-bottom: 6px;
        }

        .section-content {
            display: block;
        }

        .section-head {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            position: relative;
            gap: 0;
        }

        .section-header {
            position: relative;
            color: #3a3a3a;
            padding: 12px 30px;
            font-weight: 700;
            font-size: clamp(22px, 2.2vw, 32px);
            line-height: 1;
            background: linear-gradient(to left, #f5f5f5, #e8e8e8 55%, #f2f2f2);
            border-radius: 4px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.28);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 66px;
            flex: 1;
            overflow: visible;
            margin-inline-start: 0;
            padding-inline-start: 44px;
            clip-path: polygon(
                2% 0,
                98% 0,
                100% 16%,
                97% 34%,
                100% 50%,
                98% 68%,
                100% 84%,
                97% 100%,
                3% 100%,
                0 84%,
                2% 66%,
                0 48%,
                2% 30%,
                0 14%
            );
        }

        .section-header::before,
        .section-header::after {
            content: "";
            position: absolute;
            top: 0;
            width: 30px;
            height: 100%;
            background: linear-gradient(to left, rgba(255, 255, 255, 0), rgba(248, 248, 248, 0.98));
        }

        .section-header::before {
            left: 0;
            transform: skewX(-18deg);
            transform-origin: left;
        }

        .section-header::after {
            right: 0;
            transform: skewX(18deg);
            transform-origin: right;
        }

        .section-title-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .category-img {
            width: 132px;
            height: 132px;
            border-radius: 50%;
            object-fit: cover;
            object-position: center;
            border: 6px solid #f1c40f;
            background: #222;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.45), 0 0 0 2px rgba(241, 196, 15, 0.2);
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
            filter: contrast(1.12) saturate(1.08) brightness(1.03);
            margin-inline-start: 0;
            flex-shrink: 0;
            z-index: 2;
            position: relative;
        }

        .section-title {
            white-space: normal;
            line-height: 1.15;
            text-align: center;
        }

        .category-img-placeholder {
            width: 132px;
            height: 132px;
            border-radius: 50%;
            border: 6px solid #f1c40f;
            background: radial-gradient(circle at 30% 30%, #3d3d3d, #1f1f1f);
            margin-inline-start: 0;
            flex-shrink: 0;
            z-index: 2;
            position: relative;
        }

        .menu-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .menu-table-wrap {
            --head-h: 42px;
            --row-h: 52px;
            max-height: calc(var(--head-h) + (var(--row-h) * 5));
            overflow-y: auto;
            border-radius: 8px;
        }

        .menu-table-wrap::-webkit-scrollbar {
            width: 8px;
        }

        .menu-table-wrap::-webkit-scrollbar-thumb {
            background: #4a4a4a;
            border-radius: 999px;
        }

        .menu-table-wrap::-webkit-scrollbar-track {
            background: #1a1a1a;
        }

        .menu-table th {
            text-align: center;
            color: #f1c40f;
            font-size: 13px;
            padding-bottom: 8px;
            border-bottom: 1px solid #444;
            position: sticky;
            top: 0;
            background: #1a1a1a;
            z-index: 2;
            height: var(--head-h);
            padding-top: 0;
            padding-bottom: 0;
            vertical-align: middle;
        }

        .menu-table td {
            padding: 8px 0;
            border-bottom: 1px dotted #333;
            font-size: 15px;
            vertical-align: middle;
            text-align: center;
        }

        .item-col {
            text-align: right !important;
            width: auto;
            padding-inline-end: 8px;
        }

        .item-label {
            display: none;
        }

        .price-col {
            width: 100px;
        }

        .calories-col {
            width: 100px;
        }

        .qty-col {
            width: 120px;
            text-align: center;
        }

        .qty-control {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .qty-btn {
            width: 28px;
            height: 28px;
            border: 1px solid #555;
            background: #232323;
            color: #f1c40f;
            border-radius: 6px;
            font-weight: 700;
            cursor: pointer;
        }

        .qty-btn:hover {
            background: #2d2d2d;
        }

        .meal-qty {
            width: 42px;
            text-align: center;
            border: 1px solid #555;
            background: #111;
            color: #fff;
            border-radius: 6px;
            padding: 3px;
            font-weight: 700;
        }

        .item-name {
            font-weight: bold;
            display: flex;
            align-items: flex-start;
            line-height: 1.35;
            white-space: normal;
            word-break: break-word;
        }

        .item-name::before {
            content: "●";
            color: #f1c40f;
            margin-left: 10px;
            font-size: 12px;
            margin-top: 5px;
            flex-shrink: 0;
        }

        .price {
            text-align: center;
            font-weight: bold;
            color: #fff;
            width: 90px;
            direction: ltr;
        }

        .calories {
            text-align: center;
            color: #aaa;
            font-size: 12px;
            width: 95px;
            direction: ltr;
        }

        .empty-state {
            text-align: center;
            color: #bcbcbc;
            padding: 24px 0;
        }

        .order-panel {
            margin-top: 24px;
            padding: 16px;
            border: 1px solid #3a3a3a;
            border-radius: 10px;
            background: #161616;
        }

        .order-title {
            margin: 0 0 12px;
            color: #f1c40f;
            font-size: 22px;
            font-weight: 700;
        }

        .order-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 10px;
            align-items: stretch;
        }

        .order-input,
        .order-textarea {
            width: 100%;
            background: #0f0f0f;
            border: 1px solid #444;
            color: #fff;
            border-radius: 8px;
            padding: 10px 12px;
            font-family: inherit;
            font-size: 14px;
        }

        .order-input {
            min-height: 44px;
        }

        .order-textarea {
            min-height: 80px;
            resize: vertical;
            margin-bottom: 10px;
        }

        .order-btn {
            border: 0;
            background: #25d366;
            color: #0a0a0a;
            font-size: 18px;
            font-weight: 900;
            line-height: 1.2;
            letter-spacing: .2px;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.18);
            border-radius: 8px;
            padding: 13px 18px;
            cursor: pointer;
        }

        .location-row {
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 10px;
            margin-bottom: 10px;
            align-items: center;
        }

        .location-btn {
            border: 1px solid #4a4a4a;
            background: #202020;
            color: #f1c40f;
            font-size: 18px;
            font-weight: 900;
            line-height: 1.2;
            text-shadow: 0 0 1px rgba(0, 0, 0, 0.6);
            border-radius: 8px;
            padding: 12px 14px;
            cursor: pointer;
        }

        .location-status {
            color: #d6d6d6;
            font-size: 13px;
            min-height: 44px;
            display: flex;
            align-items: center;
            line-height: 1.6;
        }

        .order-note {
            margin-top: 8px;
            color: #c6c6c6;
            font-size: 13px;
        }

        .site-footer {
            margin-top: 36px;
            border-top: 1px solid #2e2e2e;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.025), rgba(255, 255, 255, 0));
            border-radius: 18px;
            padding: 40px 36px;
            color: #d3d3d3;
        }

        .site-footer__inner {
            display: grid;
            grid-template-columns: auto minmax(0, 1fr);
            gap: 28px;
            align-items: center;
        }

        .site-footer__meta {
            display: grid;
            gap: 14px;
            text-align: right;
            justify-items: end;
        }

        .site-footer__item {
            display: flex;
            align-items: center;
            gap: 10px;
            min-height: 24px;
        }

        .site-footer__icon {
            width: 18px;
            height: 18px;
            flex: 0 0 18px;
            color: #e0b42f;
            opacity: 0.95;
        }

        .site-footer__text {
            font-size: 14px;
            line-height: 1.8;
            letter-spacing: 0.1px;
            color: #d7d7d7;
        }

        .site-footer__text--muted {
            color: #a8a8a8;
            font-size: 13px;
        }

        .site-footer__brand {
            color: #f2c647;
            font-weight: 700;
        }

        .site-footer__contacts {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 10px;
            min-width: 250px;
            justify-items: start;
        }

        .site-footer__link {
            text-decoration: none;
            color: #f2f2f2;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid #3a3a3a;
            border-radius: 12px;
            padding: 11px 14px;
            display: inline-flex;
            align-items: center;
            justify-content: flex-start;
            gap: 10px;
            direction: ltr;
            unicode-bidi: isolate;
            font-weight: 700;
            transition: border-color 240ms ease, background-color 240ms ease, color 240ms ease, transform 240ms ease, box-shadow 240ms ease;
        }

        .site-footer__phone {
            direction: ltr;
            unicode-bidi: bidi-override;
            letter-spacing: 0.2px;
            white-space: nowrap;
        }

        .site-footer__link-icon {
            width: 16px;
            height: 16px;
            flex: 0 0 16px;
            color: #f2c647;
        }

        .site-footer__link:hover {
            border-color: #f2c647;
            background: rgba(242, 198, 71, 0.11);
            color: #fff8dc;
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.28);
        }

        .site-footer__link:focus-visible {
            outline: 2px solid #f2c647;
            outline-offset: 2px;
        }

        @media (prefers-reduced-motion: reduce) {
            .site-footer__link {
                transition: none;
            }

            .site-footer__link:hover {
                transform: none;
                box-shadow: none;
            }
        }

        @media (max-width: 900px) {
            .sections-nav {
                display: block;
                position: sticky;
                top: 0;
                z-index: 5;
                background: linear-gradient(180deg, rgba(26, 26, 26, 0.98), rgba(26, 26, 26, 0.92));
                padding-top: 6px;
            }

            body {
                padding: 12px;
            }

            .menu-container {
                padding: 18px 14px;
                border-width: 3px;
            }

            .sections-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .section {
                margin-bottom: 0;
            }

            .section:not(.active-section) {
                display: none;
            }

            .brand-badge {
                font-size: 38px;
                padding: 7px 14px 7px 12px;
            }

            .brand-icon {
                width: 44px;
                height: 54px;
                transform: translate(-12px, 3px);
            }

            .subtitle {
                font-size: 28px;
            }

            .tax-info {
                font-size: 24px;
            }

            .header-logo {
                height: 145px;
            }

            .site-footer {
                padding: 32px 20px;
                border-radius: 14px;
            }

            .site-footer__inner {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .site-footer__meta {
                justify-items: start;
                text-align: right;
            }

            .site-footer__contacts {
                min-width: 0;
            }

            .section-head {
                gap: 10px;
            }

            .section-header {
                font-size: 24px;
                min-height: 54px;
                margin-inline-start: -8px;
                padding-inline-start: 24px;
            }

            .category-img,
            .category-img-placeholder {
                width: 98px;
                height: 98px;
                border-width: 5px;
            }

            .price-col {
                width: 86px;
            }

            .calories-col {
                width: 86px;
            }

            .qty-col {
                width: 116px;
            }

            .order-grid {
                grid-template-columns: 1fr;
            }

            .location-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            body {
                padding: 8px;
            }

            .menu-container {
                padding: 14px 10px;
                border-width: 2px;
                border-radius: 14px;
            }

            header {
                margin-bottom: 18px;
            }

            .header-logo {
                height: auto;
                max-height: 190px;
                border-radius: 8px;
            }

            .section-head {
                align-items: center;
                gap: 8px;
            }

            .section-header {
                min-height: 0;
                font-size: clamp(18px, 5.5vw, 24px);
                padding: 10px 18px;
                padding-inline-start: 20px;
                margin-inline-start: -4px;
            }

            .category-img,
            .category-img-placeholder {
                width: 78px;
                height: 78px;
                border-width: 4px;
            }

            .menu-table-wrap {
                --mobile-row-h: 112px;
                max-height: calc(var(--mobile-row-h) * 5);
                overflow-y: auto;
                overflow-x: hidden;
                padding-inline: 2px;
            }

            .menu-table,
            .menu-table tbody {
                display: block;
            }

            .menu-table thead {
                display: none;
            }

            .menu-table tr {
                display: grid;
                grid-template-columns: minmax(0, 1fr);
                gap: 10px;
                padding: 12px;
                margin-bottom: 12px;
                border: 1px solid #303030;
                border-radius: 12px;
                background: #202020;
            }

            .menu-table td {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                width: 100% !important;
                padding: 0;
                border-bottom: 0;
                text-align: right;
            }

            .item-col,
            .price-col,
            .calories-col,
            .qty-col,
            .price,
            .calories {
                width: 100%;
            }

            .item-col {
                padding-inline-end: 0;
            }

            .item-name {
                display: block;
                font-size: 18px;
            }

            .item-name::before {
                display: none;
            }

            .item-label {
                display: inline-block;
                color: #f1c40f;
                font-weight: 700;
                font-size: 13px;
                flex-shrink: 0;
            }

            .price,
            .calories {
                font-size: 14px;
            }

            .qty-control {
                margin-inline-start: auto;
            }

            .qty-btn {
                width: 32px;
                height: 32px;
            }

            .meal-qty {
                width: 46px;
                min-height: 32px;
            }

            .order-panel {
                margin-top: 18px;
                padding: 14px;
            }

            .order-title {
                font-size: 20px;
            }

            .order-input,
            .order-textarea,
            .order-btn,
            .location-btn {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
<div class="menu-container">
    <header>
        <img src="{{ $menuSetting?->menu_logo ? Storage::url($menuSetting->menu_logo) : 'https://files.manuscdn.com/user_upload_by_module/session_file/310519663205681309/xdmuCVWyirdyRPmi.png' }}" alt="شعار المطعم" class="header-logo">
    </header>
    @if($categories->isEmpty())
        <div class="empty-state">لا توجد أقسام متاحة حالياً.</div>
    @else
        <nav class="sections-nav" aria-label="الأقسام">
            <div class="sections-nav-inner">
                @foreach($categories as $category)
                    <button type="button" class="sections-nav-btn @if($loop->first) active @endif" data-section-target="section-{{ $category->id }}">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </nav>
        <div class="sections-grid">
            @foreach($categories as $category)
                <section class="section @if($loop->first) active-section @endif" id="section-{{ $category->id }}">
                    <div class="section-head">
                        @if($category->image)
                            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="category-img">
                        @else
                            <div class="category-img-placeholder"></div>
                        @endif
                        <div class="section-header">
                            <div class="section-title-wrap">
                                <span class="section-title">{{ $category->name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="menu-table-wrap">
                            <table class="menu-table">
                                <thead>
                                <tr>
                                    <th class="item-col">الصنف</th>
                                    <th class="price-col">السعر</th>
                                    <th class="calories-col">السعرات</th>
                                    <th class="qty-col">الكمية</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($category->meals as $meal)
                                    <tr data-meal-name="{{ $meal->name }}" data-meal-price="{{ $meal->price }}">
                                        <td class="item-name item-col">{{ $meal->name }}</td>
                                        <td class="price price-col"><span class="item-label">السعر</span><span>{{ number_format($meal->price, 2) }} SR</span></td>
                                        <td class="calories calories-col"><span class="item-label">السعرات</span><span>{{ $meal->calories }} kcal</span></td>
                                        <td class="qty-col">
                                            <span class="item-label">الكمية</span>
                                            <div class="qty-control">
                                                <button type="button" class="qty-btn" data-action="minus">-</button>
                                                <input type="text" class="meal-qty" value="0" readonly>
                                                <button type="button" class="qty-btn" data-action="plus">+</button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="empty-state">لا توجد أصناف في هذا القسم.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>

        <section class="order-panel">
            <h2 class="order-title">طلب عبر واتساب</h2>
            <div class="order-grid">
                <input id="customerName" type="text" class="order-input" placeholder="اسم العميل (اختياري)">
                <input id="customerPhone" type="text" class="order-input" placeholder="رقم الجوال (اختياري)">
            </div>
            <div class="location-row">
                <button id="detectLocationBtn" type="button" class="location-btn">تحديد موقعي الحالي</button>
                <span id="locationStatus" class="location-status">لم يتم تحديد الموقع بعد.</span>
            </div>
            <input id="manualLocation" type="text" class="order-input" placeholder="أو اكتب موقعك يدويًا (الحي/الشارع/وصف المكان)" style="margin-bottom: 10px;">
            <textarea id="orderNotes" class="order-textarea" placeholder="ملاحظات الطلب (اختياري)"></textarea>
            <button id="sendWhatsappBtn" type="button" class="order-btn">إرسال الطلب عبر واتساب</button>
            <div class="order-note">اختر الكمية من كل صنف ثم اضغط إرسال الطلب.</div>
        </section>

        <footer class="im-footer" role="contentinfo">
  <style>
    .im-footer {
      direction: rtl;
      margin-top: 48px;
      padding: 0 16px 24px;
      font-family: system-ui, sans-serif;
    }

    .im-footer__inner {
      max-width: 1100px;
      margin: auto;
      padding: 32px;
      display: grid;
      grid-template-columns: 1fr auto;
      direction: ltr;
      align-items: center;
      gap: 32px;

      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 20px;
      background: rgba(255,255,255,0.02);
      backdrop-filter: blur(8px);
    }

    /* RIGHT SIDE */
    .im-footer__meta {
      display: flex;
      flex-direction: column;
      gap: 12px;
      direction: rtl;
      justify-self: end;
      text-align: right;
      align-items: flex-end;
    }

    .im-footer__copyright {
      color: #94a3b8;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .im-footer__developer {
      color: #fff;
      font-size: 16px;
    }

    .im-footer__brand {
      color: #facc15;
      font-weight: bold;
      text-decoration: none;
      transition: 0.3s;
    }

    .im-footer__brand:hover {
      color: #fde047;
    }

    /* LEFT SIDE */
    .im-footer__contacts {
      display: flex;
      flex-direction: column;
      gap: 10px;
      justify-self: start;
      align-items: flex-start;
    }

    .im-footer__link {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 10px 16px;
      border-radius: 12px;
      text-decoration: none;
      color: #fff;
      background: rgba(255,255,255,0.03);
      border: 1px solid rgba(255,255,255,0.08);
      transition: 0.25s;
      font-size: 14px;
      direction: ltr;
      unicode-bidi: isolate;
    }

    .im-footer__phone {
      direction: ltr;
      unicode-bidi: bidi-override;
      white-space: nowrap;
      letter-spacing: 0.2px;
    }

    .im-footer__link:hover {
      transform: translateY(-2px);
      border-color: #facc15;
      color: #fde047;
    }

    .im-footer__icon {
      width: 16px;
      height: 16px;
      color: #facc15;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
      .im-footer__inner {
        grid-template-columns: 1fr;
        text-align: center;
      }

      .im-footer__meta {
        order: 1;
        align-items: center;
        justify-self: center;
      }

      .im-footer__contacts {
        order: 2;
        align-items: center;
        justify-self: center;
      }
    }
  </style>

  <div class="im-footer__inner">

    <!-- CONTACT -->
    <div class="im-footer__contacts">
      <a href="https://wa.me/967776742913" class="im-footer__link">
        <svg class="im-footer__icon" viewBox="0 0 24 24" fill="none">
          <path d="M7 19L8 16C7 14 6 13 6 11C6 8 9 5 12 5C16 5 19 8 19 11C19 15 16 18 12 18C11 18 10 18 9 17L7 19Z" stroke="currentColor" stroke-width="1.5"/>
        </svg>
        <span class="im-footer__phone">+967 776 742 913</span>
      </a>

      <a href="https://wa.me/967777234341" class="im-footer__link">
        <svg class="im-footer__icon" viewBox="0 0 24 24" fill="none">
          <path d="M7 19L8 16C7 14 6 13 6 11C6 8 9 5 12 5C16 5 19 8 19 11C19 15 16 18 12 18C11 18 10 18 9 17L7 19Z" stroke="currentColor" stroke-width="1.5"/>
        </svg>
        <span class="im-footer__phone">+967 777 234 341</span>
      </a>
    </div>

    <!-- META -->
    <div class="im-footer__meta">
      <div class="im-footer__copyright">
        © 2026 جميع الحقوق محفوظة
      </div>

      <div class="im-footer__developer">
        تصميم وتطوير:
        <a href="" class="im-footer__brand">
          شركة IM التقنية
        </a>
      </div>
    </div>

  </div>
</footer>
    @endif
</div>
<script>
    (function () {
        const whatsappNumber = @json(preg_replace('/\D+/', '', (string) ($menuSetting->whatsapp_number ?? '')));
        const qtyButtons = document.querySelectorAll('.qty-btn');
        const sendBtn = document.getElementById('sendWhatsappBtn');
        const detectLocationBtn = document.getElementById('detectLocationBtn');
        const locationStatus = document.getElementById('locationStatus');
        const manualLocationInput = document.getElementById('manualLocation');
        const sectionNavButtons = Array.from(document.querySelectorAll('.sections-nav-btn'));
        const sections = Array.from(document.querySelectorAll('.section'));
        const mobileBreakpoint = window.matchMedia('(max-width: 900px)');
        let customerLocationText = '-';

        function setLocationStatus(message, focusManualInput = false) {
            if (locationStatus) {
                locationStatus.textContent = message;
            }

            if (focusManualInput) {
                manualLocationInput?.focus();
            }
        }

        function isSecureOriginForGeolocation() {
            return window.isSecureContext
                || ['localhost', '127.0.0.1', '::1'].includes(window.location.hostname);
        }

        async function getLocationPermissionState() {
            if (!navigator.permissions?.query) {
                return null;
            }

            try {
                const result = await navigator.permissions.query({ name: 'geolocation' });
                return result.state;
            } catch (error) {
                return null;
            }
        }

        function requestBrowserLocation(options) {
            return new Promise((resolve, reject) => {
                navigator.geolocation.getCurrentPosition(resolve, reject, options);
            });
        }

        async function detectCurrentLocation() {
            const attempts = [
                {
                    options: { enableHighAccuracy: true, timeout: 12000, maximumAge: 0 },
                    loadingMessage: 'جاري تحديد الموقع بدقة عالية...'
                },
                {
                    options: { enableHighAccuracy: false, timeout: 15000, maximumAge: 60000 },
                    loadingMessage: 'جارٍ إعادة المحاولة بطريقة أسرع لتحديد الموقع...'
                }
            ];

            let lastError = null;

            for (const attempt of attempts) {
                setLocationStatus(attempt.loadingMessage);

                try {
                    return await requestBrowserLocation(attempt.options);
                } catch (error) {
                    lastError = error;

                    if (error?.code === 1) {
                        throw error;
                    }
                }
            }

            throw lastError;
        }

        function setActiveSection(sectionId, options = {}) {
            const shouldScroll = options.scroll ?? true;

            sections.forEach((section) => {
                section.classList.toggle('active-section', section.id === sectionId);
            });

            sectionNavButtons.forEach((button) => {
                const isActive = button.dataset.sectionTarget === sectionId;
                button.classList.toggle('active', isActive);

                if (isActive) {
                    button.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                }
            });

            if (!mobileBreakpoint.matches || !shouldScroll) {
                return;
            }

            const targetSection = document.getElementById(sectionId);
            targetSection?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function syncSectionsLayout() {
            if (!sections.length) {
                return;
            }

            if (mobileBreakpoint.matches) {
                const activeSection = document.querySelector('.section.active-section') || sections[0];
                setActiveSection(activeSection.id, { scroll: false });
                return;
            }

            sections.forEach((section) => section.classList.add('active-section'));
            sectionNavButtons.forEach((button, index) => {
                button.classList.toggle('active', index === 0);
            });
        }

        sectionNavButtons.forEach((button) => {
            button.addEventListener('click', function () {
                const sectionId = this.dataset.sectionTarget;

                if (!sectionId) {
                    return;
                }

                if (mobileBreakpoint.matches) {
                    setActiveSection(sectionId);
                    return;
                }

                document.getElementById(sectionId)?.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });

        if (typeof mobileBreakpoint.addEventListener === 'function') {
            mobileBreakpoint.addEventListener('change', syncSectionsLayout);
        } else if (typeof mobileBreakpoint.addListener === 'function') {
            mobileBreakpoint.addListener(syncSectionsLayout);
        }

        syncSectionsLayout();

        detectLocationBtn?.addEventListener('click', async function () {
            if (!navigator.geolocation) {
                customerLocationText = '-';
                setLocationStatus('المتصفح لا يدعم تحديد الموقع. اكتب العنوان يدويًا في الحقل المخصص.', true);
                return;
            }

            if (!isSecureOriginForGeolocation()) {
                customerLocationText = '-';
                setLocationStatus('تحديد الموقع يحتاج رابطًا آمنًا HTTPS. إذا فتحت الموقع من رابط غير آمن فسيمنع المتصفح الوصول للموقع. اكتب موقعك يدويًا أو افتح النسخة الآمنة.', true);
                return;
            }

            const permissionState = await getLocationPermissionState();
            if (permissionState === 'denied') {
                customerLocationText = '-';
                setLocationStatus('تم رفض إذن الموقع في المتصفح. فعّل صلاحية الموقع لهذا الموقع ثم حاول مرة أخرى، أو اكتب العنوان يدويًا.', true);
                return;
            }

            detectLocationBtn.disabled = true;

            try {
                const position = await detectCurrentLocation();
                const lat = position.coords.latitude.toFixed(6);
                const lng = position.coords.longitude.toFixed(6);
                customerLocationText = `https://maps.google.com/?q=${lat},${lng}`;
                setLocationStatus('تم تحديد الموقع بنجاح وإرفاق رابط الموقع الحالي.');
            } catch (error) {
                customerLocationText = '-';

                if (error?.code === 1) {
                    setLocationStatus('تم رفض الوصول للموقع. اسمح بصلاحية الموقع من المتصفح ثم أعد المحاولة، أو اكتب العنوان يدويًا.', true);
                    return;
                }

                if (error?.code === 2) {
                    setLocationStatus('تعذر جلب موقعك من الجهاز الآن. تأكد من تشغيل GPS والإنترنت ثم حاول مرة أخرى، أو اكتب العنوان يدويًا.', true);
                    return;
                }

                if (error?.code === 3) {
                    setLocationStatus('انتهت مهلة تحديد الموقع حتى بعد إعادة المحاولة. جرّب مرة أخرى في مكان مفتوح أو اكتب العنوان يدويًا.', true);
                    return;
                }

                setLocationStatus('تعذر تحديد الموقع من المتصفح الحالي. اكتب عنوانك يدويًا في الحقل المخصص.', true);
            } finally {
                detectLocationBtn.disabled = false;
            }
        });

        qtyButtons.forEach((btn) => {
            btn.addEventListener('click', function () {
                const row = this.closest('tr');
                const qtyInput = row.querySelector('.meal-qty');
                let current = Number(qtyInput.value || 0);

                if (this.dataset.action === 'plus') {
                    current += 1;
                } else if (this.dataset.action === 'minus' && current > 0) {
                    current -= 1;
                }

                qtyInput.value = String(current);
            });
        });

        sendBtn?.addEventListener('click', function () {
            if (!whatsappNumber) {
                alert('يرجى إضافة رقم الواتساب من لوحة التحكم أولاً.');
                return;
            }

            const selectedRows = Array.from(document.querySelectorAll('tr[data-meal-name]'))
                .map((row) => {
                    const qty = Number(row.querySelector('.meal-qty')?.value || 0);
                    if (qty <= 0) return null;

                    const name = row.dataset.mealName || '';
                    const price = Number(row.dataset.mealPrice || 0);
                    return { name, qty, price };
                })
                .filter(Boolean);

            if (!selectedRows.length) {
                alert('اختر صنف واحد على الأقل لإرسال الطلب.');
                return;
            }

            const customerName = document.getElementById('customerName')?.value?.trim() || '-';
            const customerPhone = document.getElementById('customerPhone')?.value?.trim() || '-';
            const manualLocation = document.getElementById('manualLocation')?.value?.trim() || '';
            const notes = document.getElementById('orderNotes')?.value?.trim() || '-';
            const finalLocation = customerLocationText !== '-' ? customerLocationText : (manualLocation || '-');

            let total = 0;
            const lines = selectedRows.map((item, index) => {
                const itemTotal = item.qty * item.price;
                total += itemTotal;
                return `${index + 1}. ${item.name} - الكمية: ${item.qty} - السعر: ${itemTotal.toFixed(2)} SR`;
            });

            const message = [
                'طلب جديد من قائمة الطعام',
                '',
                `اسم العميل: ${customerName}`,
                `رقم الجوال: ${customerPhone}`,
                '',
                'تفاصيل الطلب:',
                ...lines,
                '',
                `الإجمالي التقريبي: ${total.toFixed(2)} SR`,
                `الموقع: ${finalLocation}`,
                `ملاحظات: ${notes}`
            ].join('\n');

            const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
        });
    })();
</script>
</body>
</html>
