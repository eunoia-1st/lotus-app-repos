<h1>Edit Kategori</h1>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('question-categories.update', $questionCategory) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Kategori:</label><br>
    <input type="text" name="name" value="{{ old('name', $questionCategory->name) }}"><br><br>

    <label>
        <input type="checkbox" name="is_published"
            {{ old('is_published', $questionCategory->is_published) ? 'checked' : '' }}>
        Published
    </label><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('question-categories.index') }}">Kembali</a>
