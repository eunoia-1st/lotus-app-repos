<h2>Daftar Feedback</h2>

<table id="feedback-table" border="1" cellpadding="8" cellspacing="0">
    <thead>
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
                    <a href="{{ route('feedback-answers.show', $feedback->id) }}">Lihat Detail</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Belum ada feedback masuk</td>
            </tr>
        @endforelse
    </tbody>
</table>
