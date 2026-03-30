@extends('admin.layouts.app')

@section('title', 'الوجبات')
@section('page_title', 'الوجبات')
@section('page_subtitle', 'إدارة الوجبات والأسعار والسعرات الحرارية')

@push('styles')
    <style>
        @media (max-width: 576px) {
            .meals-card-header {
                gap: .75rem;
            }

            .meals-card-header > * {
                width: 100%;
            }

            .meals-mobile-table thead {
                display: none;
            }

            .meals-mobile-table,
            .meals-mobile-table tbody,
            .meals-mobile-table tr,
            .meals-mobile-table td {
                display: block;
                width: 100%;
            }

            .meals-mobile-table tbody {
                padding: .35rem;
            }

            .meals-mobile-table tr {
                border: 1px solid #e8edf5;
                border-radius: 14px;
                background: #fff;
                padding: .9rem;
                margin-bottom: .85rem;
                box-shadow: 0 8px 22px rgba(15, 23, 42, .06);
            }

            .meals-mobile-table td {
                border: 0;
                padding: .35rem 0;
            }

            .meals-mobile-table td::before {
                content: attr(data-label);
                display: block;
                color: #64748b;
                font-size: .74rem;
                font-weight: 700;
                margin-bottom: .2rem;
                text-transform: uppercase;
                letter-spacing: .03em;
            }

            .meals-mobile-table td[data-label="المعرف"],
            .meals-mobile-table td[data-label="تاريخ الإنشاء"],
            .meals-mobile-table td[data-label="السعرات"] {
                display: none;
            }

            .meals-mobile-table td[data-label="الاسم"]::before,
            .meals-mobile-table td[data-label="القسم"]::before,
            .meals-mobile-table td[data-label="السعر"]::before {
                display: none;
            }

            .meals-mobile-table .actions-cell .d-flex {
                display: grid !important;
                grid-template-columns: 1fr;
                gap: .6rem !important;
            }

            .meals-mobile-table .actions-cell .btn,
            .meals-mobile-table .actions-cell form,
            .meals-mobile-table .actions-cell form .btn {
                width: 100%;
            }
        }
    </style>
@endpush

@section('header_actions')
    <a href="{{ route('meals.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i>
        إضافة وجبة
    </a>
@endsection

@section('content')
    <div class="page-card">
        <div class="card-header meals-card-header d-flex align-items-center justify-content-between flex-wrap">
            <span>كل الوجبات</span>
            <span class="metric-badge">{{ $meals->count() }} عنصر</span>
        </div>
        <div class="table-responsive">
            <table class="table table-modern meals-mobile-table mb-0">
                <thead>
                <tr>
                    <th style="width: 80px;">المعرف</th>
                    <th>الاسم</th>
                    <th style="width: 220px;">القسم</th>
                    <th style="width: 130px;">السعر</th>
                    <th style="width: 120px;">السعرات</th>
                    <th style="width: 210px;">تاريخ الإنشاء</th>
                    <th style="width: 190px;">الإجراءات</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($meals as $meal)
                    <tr>
                        <td data-label="المعرف">#{{ $meal->id }}</td>
                        <td data-label="الاسم" class="fw-semibold">{{ $meal->name }}</td>
                        <td data-label="القسم">{{ $meal->category?->name }}</td>
                        <td data-label="السعر">{{ number_format($meal->price, 2) }} ر.س</td>
                        <td data-label="السعرات">{{ $meal->calories }}</td>
                        <td data-label="تاريخ الإنشاء">{{ $meal->created_at?->format('Y-m-d H:i') }}</td>
                        <td data-label="الإجراءات" class="actions-cell">
                            <div class="d-flex gap-2">
                                <a href="{{ route('meals.edit', $meal) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                    تعديل
                                </a>
                                <form action="{{ route('meals.destroy', $meal) }}" method="POST" onsubmit="return confirm('هل تريد حذف هذه الوجبة؟');">
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
                        <td colspan="7" class="text-center py-4 text-muted">لا توجد وجبات.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
