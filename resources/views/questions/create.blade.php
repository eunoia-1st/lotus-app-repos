@extends('layouts.admin_layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Pertanyaan untuk Kategori: {{ $category->name }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('questions.store', $category->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="question_text" class="form-label">Pertanyaan</label>
                    <textarea id="question_text" name="question_text" class="form-control" rows="4" placeholder="Isi Pertanyaan . . ."></textarea>
                </div>

                <div class="mb-3">
                    <label for="question_type" class="form-label">Tipe Pertanyaan</label>
                    <select id="question_type" name="question_type" class="form-select">
                        <option value="checkbox">Checkbox</option>
                        <option value="option">Option</option>
                        <option value="text">Text</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('questions.index', $category->id) }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
