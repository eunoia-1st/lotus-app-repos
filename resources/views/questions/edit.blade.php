<h1>Edit Pertanyaan</h1>

<form action="{{ route('questions.update', $question->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Pertanyaan:</label><br>
    <input type="text" name="question_text" value="{{ old('question_text', $question->question_text) }}"><br><br>

    <label>Tipe:</label><br>
    <select name="question_type">
        <option value="checkbox" {{ $question->question_type == 'checkbox' ? 'selected' : '' }}>Checkbox</option>
        <option value="option" {{ $question->question_type == 'option' ? 'selected' : '' }}>Option
        </option>
        <option value="text" {{ $question->question_type == 'text' ? 'selected' : '' }}>Text</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('questions.index', $question->question_category_id) }}">← Kembali</a>
