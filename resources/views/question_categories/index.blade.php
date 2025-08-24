@extends('layouts.admin_layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">📂 Daftar Kategori Pertanyaan</h1>

        <a href="{{ route('question-categories.create') }}" class="btn btn-primary mb-3">
            ➕ Tambah Kategori Baru
        </a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Published</th>
                            <th>Pertanyaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <span class="badge {{ $category->is_published ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $category->is_published ? 'Ya' : 'Tidak' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('questions.index', $category->id) }}" class="btn btn-sm btn-info">
                                        🔍 Lihat Pertanyaan
                                    </a>
                                </td>
                                <td>
                                    {{-- Tombol Toggle --}}
                                    <form action="{{ route('question-categories.toggle', $category) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="btn btn-sm {{ $category->is_published ? 'btn-warning' : 'btn-success' }}">
                                            {{ $category->is_published ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>

                                    @if (!$category->is_published)
                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('question-categories.edit', $category) }}"
                                            class="btn btn-sm btn-primary">
                                            ✏️ Edit
                                        </a>

                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('question-categories.destroy', $category) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Hapus kategori ini?')"
                                                class="btn btn-sm btn-danger">
                                                🗑 Hapus
                                            </button>
                                        </form>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</div>
