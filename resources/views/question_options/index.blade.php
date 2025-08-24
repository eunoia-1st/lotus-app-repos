@extends('layouts.admin_layout')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">⚙️ Opsi untuk Pertanyaan: <em>"{{ $question->question_text }}"</em></h2>

        <a href="{{ route('question-options.create', $question->id) }}" class="btn btn-primary mb-3">
            ➕ Tambah Opsi Baru
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
                            <th>Opsi Pilihan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($options as $option)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $option->question_value }}</td>
                                <td>
                                    <a href="{{ route('question-options.edit', [$question->id, $option->id]) }}"
                                        class="btn btn-sm btn-warning">
                                        ✏️ Edit
                                    </a>

                                    <form action="{{ route('question-options.destroy', [$question->id, $option->id]) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus opsi ini?')"
                                            class="btn btn-sm btn-danger">
                                            🗑 Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada opsi ditambahkan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    <a href="{{ route('questions.index', $question->question_category_id) }}" class="btn btn-secondary">
                        ← Kembali ke Pertanyaan
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
