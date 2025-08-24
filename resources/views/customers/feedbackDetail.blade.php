@extends('layouts.admin_layout')

@section('title', 'Detail Feedback')
@section('page-title', 'Detail Feedback')

@section('content')

    <a href="{{ route('customers.feedbacks', $feedbackDetail->customer_id) }}" class="btn btn-primary mb-3">
        &larr; Kembali
    </a>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Customer:</strong> {{ $feedbackDetail->customer->name ?? 'Anonim' }}</p>
            <p><strong>Phone:</strong> {{ $feedbackDetail->customer->phone ?? '-' }}</p>
            <p><strong>Email:</strong> {{ $feedbackDetail->customer->email ?? '-' }}</p>
            <p><strong>Seat:</strong> {{ $feedbackDetail->seat->name ?? '-' }}</p>
            <p><strong>Tanggal Submit:</strong> {{ $feedbackDetail->created_at->format('d-m-Y H:i') }}</p>
        </div>
    </div>

    <h4 class="mt-4">Jawaban Feedback</h4>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Kategori</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbackDetail->answers as $answer)
                <tr>
                    <td>{{ $answer->question->question_category->name }}</td>
                    <td>{{ $answer->question->question_text }}</td>
                    <td>
                        @php
                            $type = $answer->question->question_type;
                            if ($type === 'text') {
                                $display = $answer->answer_text;
                            } elseif ($type === 'option') {
                                $display = $answer->question->question_options
                                    ->where('id', $answer->option_id)
                                    ->pluck('question_value')
                                    ->first();
                            } elseif ($type === 'checkbox') {
                                $selectedIds = json_decode($answer->option_id, true);
                                $display = $answer->question->question_options
                                    ->whereIn('id', $selectedIds)
                                    ->pluck('question_value')
                                    ->implode(', ');
                            } else {
                                $display = '-';
                            }
                        @endphp
                        {{ $display }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Karyawan Yang Bekerja:</h4>
    @php
        // Mengelompokkan employees berdasarkan posisi
        $groupedEmployees = $feedbackDetail->employees->groupBy('position');
    @endphp

    <table class="table table-bordered table-striped w-50">
        <thead class="table-dark">
            <tr>
                <th>Posisi</th>
                <th>Nama Karyawan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($groupedEmployees as $position => $employees)
                @foreach ($employees as $i => $employee)
                    <tr>
                        @if ($i == 0)
                            <td rowspan="{{ count($employees) }}" class="align-middle">
                                {{ $position }}
                            </td>
                        @endif
                        <td>{{ $employee->name }}</td>
                    </tr>
                @endforeach
            @empty
                <tr>
                    <td colspan="2" class="text-center text-muted">Tidak ada karyawan terkait.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
