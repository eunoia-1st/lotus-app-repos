@extends('layouts.admin_layout')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Tambah Kategori Baru</h2>
        </div>
        <div class="card-body">
            {{-- Tampilkan error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('question-categories.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nama Kategori:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                        required>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="is_published" name="is_published"
                        {{ old('is_published') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">
                        Published
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('question-categories.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
