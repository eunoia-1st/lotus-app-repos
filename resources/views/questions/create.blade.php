<h1>Tambah Pertanyaan untuk Kategori: {{ $category->name }}</h1>

<form action="{{ route('questions.store', $category->id) }}" method="POST">
    @csrf
    <label>Pertanyaan:</label><br>
    <textarea name="question_text" rows="5" cols="30" placeholder="Isi Pertanyaan . . ."></textarea><br><br>

    <label>Tipe:</label><br>
    <select name="question_type">
        <option value="checkbox">Checkbox</option>
        <option value="option">Option</option>
        <option value="text">Text</option>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('questions.index', $category->id) }}">← Kembali</a>
