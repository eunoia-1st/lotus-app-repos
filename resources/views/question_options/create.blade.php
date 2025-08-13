<h1>Tambah Opsi untuk Pertanyaan: "{{ $question->question_text }}"</h1>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('question-options.store', ['question' => $question->id]) }}" method="POST">
    @csrf
    <label>Isi Opsi:</label><br>
    <input type="text" name="question_value"><br><br>

    <button type="submit">Simpan</button>
</form>
