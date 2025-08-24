@extends('layouts.admin_layout')

@section('title', 'Tambah Opsi Pertanyaan')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Opsi untuk Pertanyaan</h5>
            </div>
            <div class="card-body">
                <p><strong>Pertanyaan:</strong> "{{ $question->question_text }}"</p>

                {{-- Tampilkan error validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('question-options.store', ['question' => $question->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Isi Opsi</label>
                        <input type="text" name="question_value" class="form-control" placeholder="Masukkan teks opsi">
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-success me-2">💾 Simpan</button>
                        <a href="{{ route('question-options.index', $question->id) }}" class="btn btn-secondary">❌ Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
