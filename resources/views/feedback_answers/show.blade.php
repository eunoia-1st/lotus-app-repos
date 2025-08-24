@extends('layouts.admin_layout')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">📌 Detail Feedback</h2>

        <div class="card shadow mb-4">
            <div class="card-body">
                <p><strong>Customer:</strong> {{ $feedbackAnswer->customer->name ?? 'Anonim' }}</p>
                <p><strong>Phone:</strong> {{ $feedbackAnswer->customer->phone ?? '-' }}</p>
                <p><strong>Email:</strong> {{ $feedbackAnswer->customer->email ?? '-' }}</p>
                <p><strong>Seat:</strong> {{ $feedbackAnswer->seat->name ?? '-' }}</p>
                <p><strong>Tanggal Submit:</strong> {{ $feedbackAnswer->created_at->format('d-m-Y H:i') }}</p>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h5 class="mb-3">📝 Jawaban Feedback</h5>
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Kategori</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbackAnswer->answers as $answer)
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

                <h5 class="mt-4">👷‍♂️ Karyawan Yang Bekerja</h5>
                @php
                    $groupedEmployees = $feedbackAnswer->employees->groupBy('position');
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

                <a href="{{ route('feedback-answers.index') }}" class="btn btn-secondary mt-3">← Kembali</a>
            </div>
        </div>
    </div>
@endsection
