@extends('layouts.admin_layout')

@section('title', 'Feedback Customer')
@section('page-title', 'Feedback dari ' . $customer->name)

@section('content')

    <a href="{{ route('customers.index') }}" class="btn btn-primary mb-3">
        &larr; Kembali
    </a>

    <table class="table table-bordered table-striped" id="feedback-table">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Tanggal Submit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($feedbacks as $index => $feedback)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @php
                            // Ambil nama kategori dari semua jawaban, unique, lalu gabungkan
                            $categories = $feedback->answers
                                ->pluck('question.question_category.name')
                                ->unique()
                                ->implode(', ');
                        @endphp
                        {{ $categories }}
                    </td>
                    <td>{{ $feedback->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="{{ route('customers.feedbackDetail', $feedback->id) }}" class="btn btn-sm btn-info">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada feedback dari customer ini</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
