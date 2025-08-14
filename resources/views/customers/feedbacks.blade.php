<h2>Feedback dari {{ $customer->name }}</h2>

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
                    <a href="{{ route('customers.feedbackDetail', $feedback->id) }}">Lihat Detail</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Belum ada feedback dari customer ini</td>
            </tr>
        @endforelse
    </tbody>
    <a href="{{ route('customers.index') }}"
        style="display:inline-block; margin-bottom:10px; padding:6px 12px; background-color:#3490dc; color:white; text-decoration:none; border-radius:4px;">
        &larr; Kembali
    </a>
</table>
