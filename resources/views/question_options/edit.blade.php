<h1>Edit Opsi Pertanyaan</h1>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
@endif

<form
    action="{{ route('question-options.update', ['question' => $questionOption->question_id, 'option' => $questionOption->id]) }}"
    method="POST">

    @csrf
    @method('PUT')

    <label>Pertanyaan:</label><br>
    <input type="text" value="{{ $questionOption->question->question_text ?? '-' }}" disabled><br><br>
    <input type="hidden" name="question_id" value="{{ $questionOption->question_id }}">

    <label>Isi Opsi:</label><br>
    <input type="text" name="question_value" value="{{ $questionOption->question_value }}"><br><br>

    <button type="submit">Update</button>
    <a href="{{ route('question-options.index', ['question' => $questionOption->question_id]) }}">
        <button type="button">Cancel</button>
    </a>
</form>
