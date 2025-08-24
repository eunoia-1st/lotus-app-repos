@extends('layouts.admin_layout')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">📋 Daftar Feedback</h2>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Tanggal Submit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($feedbackAnswer as $index => $feedback)
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
                                <td>{{ $feedback->created_at->format('d-m-Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('feedback-answers.show', $feedback->id) }}"
                                        class="btn btn-sm btn-primary">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Belum ada feedback masuk
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
