@extends('admin.layouts.app')

@section('title', 'الأقسام')
@section('page_title', 'الأقسام')
@section('page_subtitle', 'إدارة أقسام المنيو وصورها')

@push('styles')
    <style>
        @media (max-width: 576px) {
            .categories-card-header {
                gap: .75rem;
            }

            .categories-card-header > * {
                width: 100%;
            }

            .categories-mobile-table thead {
                display: none;
            }

            .categories-mobile-table,
            .categories-mobile-table tbody,
            .categories-mobile-table tr,
            .categories-mobile-table td {
                display: block;
                width: 100%;
            }

            .categories-mobile-table tbody {
                padding: .35rem;
            }

            .categories-mobile-table tr {
                border: 1px solid #e8edf5;
                border-radius: 14px;
                background: #fff;
                padding: .9rem;
                margin-bottom: .85rem;
                box-shadow: 0 8px 22px rgba(15, 23, 42, .06);
            }

            .categories-mobile-table td {
                border: 0;
                padding: .35rem 0;
            }

            .categories-mobile-table td::before {
                content: attr(data-label);
                display: block;
                color: #64748b;
                font-size: .74rem;
                font-weight: 700;
                margin-bottom: .2rem;
                text-transform: uppercase;
                letter-spacing: .03em;
            }

            .categories-mobile-table td[data-label="الصورة"]::before {
                margin-bottom: .45rem;
            }

            .categories-mobile-table td[data-label="المعرف"],
            .categories-mobile-table td[data-label="تاريخ الإنشاء"] {
                display: none;
            }

            .categories-mobile-table td[data-label="الصورة"]::before,
            .categories-mobile-table td[data-label="الاسم"]::before {
                display: none;
            }

            .categories-mobile-table .category-image-cell {
                display: flex;
                justify-content: flex-start;
            }

            .categories-mobile-table .thumb {
                width: 64px;
                height: 64px;
            }

            .categories-mobile-table .actions-cell .d-flex {
                display: grid !important;
                grid-template-columns: 1fr;
                gap: .6rem !important;
            }

            .categories-mobile-table .actions-cell .btn,
            .categories-mobile-table .actions-cell form,
            .categories-mobile-table .actions-cell form .btn {
                width: 100%;
            }
        }
    </style>
@endpush

@section('header_actions')
    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i>
        إضافة قسم
    </a>
@endsection

@section('content')
    <div class="page-card">
        <div class="card-header categories-card-header d-flex align-items-center justify-content-between flex-wrap">
            <span>كل الأقسام</span>
            <span class="metric-badge">{{ $categories->count() }} عنصر</span>
        </div>
        <div class="table-responsive">
            <table class="table table-modern categories-mobile-table mb-0">
                <thead>
                <tr>
                    <th style="width: 90px;">المعرف</th>
                    <th style="width: 110px;">الصورة</th>
                    <th>الاسم</th>
                    <th style="width: 210px;">تاريخ الإنشاء</th>
                    <th style="width: 190px;">الإجراءات</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td data-label="المعرف">#{{ $category->id }}</td>
                        <td data-label="الصورة" class="category-image-cell">
                            @if ($category->image)
                                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="thumb">
                            @else
                                <span class="text-muted small">لا توجد صورة</span>
                            @endif
                        </td>
                        <td data-label="الاسم" class="fw-semibold">{{ $category->name }}</td>
                        <td data-label="تاريخ الإنشاء">{{ $category->created_at?->format('Y-m-d H:i') }}</td>
                        <td data-label="الإجراءات" class="actions-cell">
                            <div class="d-flex gap-2">
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                    تعديل
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('هل تريد حذف هذا القسم؟ سيتم حذف الوجبات التابعة له أيضًا.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash3"></i>
                                        حذف
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">لا توجد أقسام.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
