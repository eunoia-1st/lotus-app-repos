@extends('layouts.customer_layout')

@section('title', 'Pilih Kategori Feedback')
@section('header', 'Pilih Kategori Feedback')

@section('content')
    <div style="display: flex; flex-direction: column; gap: 10px;">
        @if ($categories->isEmpty())
            <p>Tidak ada kategori feedback yang tersedia saat ini.</p>
        @else
            @foreach ($categories as $category)
                <a href="{{ route('feedback.questions', $category->id) }}"
                    style="
                        display: block;
                        border: 1px solid #ccc;
                        border-radius: 8px;
                        padding: 15px;
                        text-decoration: none;
                        color: black;
                        background-color: #fff;
                        transition: background 0.2s, box-shadow 0.2s;
                    "
                    class="category-card">
                    {{ $category->name }}
                </a>
            @endforeach
        @endif
    </div>

    <style>
        .category-card:hover {
            background-color: #f0f0f0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .category-card {
                font-size: 16px;
                padding: 12px;
            }
        }
    </style>
@endsection
