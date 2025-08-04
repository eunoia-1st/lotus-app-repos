<h1>Daftar Kategori Pertanyaan</h1>

<a href="{{ route('question-categories.create') }}">Tambah Kategori Baru</a>

@if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Published</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->is_published ? 'Ya' : 'Tidak' }}</td>
                <td>
                    {{-- Tombol Toggle --}}
                    <form action="{{ route('question-categories.toggle', $category) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit">
                            {{ $category->is_published ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                    </form>

                    {{-- Tombol Edit --}}
                    <a href="{{ route('question-categories.edit', $category) }}">Edit</a>

                    {{-- Tombol Hapus --}}
                    <form action="{{ route('question-categories.destroy', $category) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
