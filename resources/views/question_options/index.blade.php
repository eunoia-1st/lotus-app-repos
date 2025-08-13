<h1>Opsi untuk Pertanyaan: "{{ $question->question_text }}"</h1>

<a href="{{ route('question-options.create', $question->id) }}">Tambah Opsi Baru</a>

@if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Opsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($options as $option)
            <tr>
                <td>{{ $option->id }}</td>
                <td>{{ $option->question_value }}</td>
                <td>
                    <a href="{{ route('question-options.edit', [$question->id, $option->id]) }}">Edit</a>

                    <form action="{{ route('question-options.destroy', [$question->id, $option->id]) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus opsi ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('questions.index', $question->question_category_id) }}">← Kembali ke Pertanyaan</a>
