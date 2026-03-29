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

        .section {
            margin-bottom: 6px;
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
        }

        .order-note {
            margin-top: 8px;
            color: #c6c6c6;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .sections-grid {
                grid-template-columns: 1fr;
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

            .section-header {
                font-size: 24px;
                min-height: 54px;
                margin-inline-start: -14px;
                padding-inline-start: 30px;
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
        <div class="sections-grid">
            @foreach($categories as $category)
                <section class="section">
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
                                    <td class="price price-col">{{ number_format($meal->price, 2) }} SR</td>
                                    <td class="calories calories-col">{{ $meal->calories }} kcal</td>
                                    <td class="qty-col">
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
    @endif
</div>
<script>
    (function () {
        const whatsappNumber = @json(preg_replace('/\D+/', '', (string) ($menuSetting->whatsapp_number ?? '')));
        const qtyButtons = document.querySelectorAll('.qty-btn');
        const sendBtn = document.getElementById('sendWhatsappBtn');
        const detectLocationBtn = document.getElementById('detectLocationBtn');
        const locationStatus = document.getElementById('locationStatus');
        let customerLocationText = '-';

        detectLocationBtn?.addEventListener('click', function () {
            if (!navigator.geolocation) {
                customerLocationText = '-';
                if (locationStatus) locationStatus.textContent = 'المتصفح لا يدعم تحديد الموقع.';
                return;
            }

            if (locationStatus) locationStatus.textContent = 'جاري تحديد الموقع...';

            navigator.geolocation.getCurrentPosition(
                function (position) {
                    const lat = position.coords.latitude.toFixed(6);
                    const lng = position.coords.longitude.toFixed(6);
                    customerLocationText = `https://maps.google.com/?q=${lat},${lng}`;
                    if (locationStatus) locationStatus.textContent = 'تم تحديد الموقع بنجاح.';
                },
                function () {
                    customerLocationText = '-';
                    if (locationStatus) locationStatus.textContent = 'تعذر تحديد الموقع. تأكد من السماح بالوصول للموقع.';
                },
                { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 }
            );
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
