@extends('layouts.admin_layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Opsi Pertanyaan</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('question-options.update', ['question' => $questionOption->question_id, 'option' => $questionOption->id]) }}"
                method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Pertanyaan</label>
                    <input type="text" class="form-control" value="{{ $questionOption->question->question_text ?? '-' }}"
                        disabled>
                    <input type="hidden" name="question_id" value="{{ $questionOption->question_id }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Opsi</label>
                    <input type="text" name="question_value" class="form-control"
                        value="{{ $questionOption->question_value }}">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('question-options.index', ['question' => $questionOption->question_id]) }}"
                        class="btn btn-secondary me-2">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
