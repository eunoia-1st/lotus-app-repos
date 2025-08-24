@extends('layouts.admin_layout')

@section('title', 'Dashboard Admin')
@section('header', 'Dashboard Admin Lotus')

@section('content')
    <!-- Ringkasan Statistik -->
    <div style="display:flex; gap:15px; flex-wrap:wrap; margin-bottom:20px;">
        <div
            style="flex:1; min-width:180px; background-color:#fff; padding:15px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
            <h4>Total Customer</h4>
            <p>{{ $totalCustomer ?? 0 }}</p>
        </div>
        <div
            style="flex:1; min-width:180px; background-color:#fff; padding:15px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
            <h4>Total Category</h4>
            <p>{{ $totalCategory ?? 0 }}</p>
        </div>
        <div
            style="flex:1; min-width:180px; background-color:#fff; padding:15px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
            <h4>Total Feedback</h4>
            <p>{{ $totalFeedback ?? 0 }}</p>
        </div>
    </div>

    <!-- Feedback Masuk Hari Ini -->
    <h3>Feedback Masuk Hari Ini</h3>
    <div class="card shadow mb-4">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Customer</th>
                        <th>Seat</th>
                        <th>Tanggal Submit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($todayFeedback as $index => $feedback)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @php
                                    $categories = $feedback->answers
                                        ->pluck('question.question_category.name')
                                        ->unique()
                                        ->implode(', ');
                                @endphp
                                {{ $categories }}
                            </td>
                            <td>{{ $feedback->customer->name ?? 'Anonim' }}</td>
                            <td>{{ $feedback->seat->name ?? '-' }}</td>
                            <td>{{ $feedback->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ route('feedback-answers.show', $feedback->id) }}" class="btn btn-sm btn-primary">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Belum ada feedback baru hari ini
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
