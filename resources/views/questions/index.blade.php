<h1>Pertanyaan untuk Kategori: {{ $category->name }}</h1>

<a href="{{ route('questions.create', $category->id) }}">Tambah Pertanyaan</a>

@if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Teks Pertanyaan</th>
            <th>Tipe</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($category->questions as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td>{{ $question->question_text }}</td>
                <td>
                    @if (in_array($question->question_type, ['option', 'checkbox']))
                        <a href="{{ route('question-options.index', $question->id) }}">
                            {{ ucfirst($question->question_type) }} (Lihat Opsi)
                        </a>
                    @else
                        <p>Text</p>
                    @endif
                </td>
                <td>
                    <a href="{{ route('questions.edit', $question->id) }}">Edit</a>
                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('question-categories.index') }}">← Kembali ke Kategori</a>
