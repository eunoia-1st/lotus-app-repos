<h2>Detail Feedback</h2>

<p><strong>Customer:</strong> {{ $feedbackAnswer->customer->name ?? 'Anonim' }}</p>
<p><strong>Phone:</strong> {{ $feedbackAnswer->customer->phone ?? '-' }}</p>
<p><strong>Email:</strong> {{ $feedbackAnswer->customer->email ?? '-' }}</p>
<p><strong>Seat:</strong> {{ $feedbackAnswer->seat->name ?? '-' }}</p>
<p><strong>Tanggal Submit:</strong> {{ $feedbackAnswer->created_at->format('d-m-Y H:i') }}</p>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
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

<br>
<a href="{{ route('feedback-answers.index') }}">← Kembali</a>
