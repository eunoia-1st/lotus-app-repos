@extends('layouts.admin_layout')

@section('title', 'Tambah Karyawan')
@section('page-title', 'Tambah Karyawan Baru')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('employees.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" name="name" id="name" class="form-control" required
                        value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label">Posisi:</label>
                    <select name="position" id="position" class="form-select" required>
                        <option value="">-- Pilih Posisi --</option>
                        <option value="office" {{ old('position') == 'office' ? 'selected' : '' }}>Office</option>
                        <option value="waiter" {{ old('position') == 'waiter' ? 'selected' : '' }}>Waiter</option>
                        <option value="cook" {{ old('position') == 'cook' ? 'selected' : '' }}>Cook</option>
                        <option value="staff" {{ old('position') == 'staff' ? 'selected' : '' }}>Staff</option>
                        <!-- Tambahkan opsi posisi lain sesuai kebutuhan -->
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">← Kembali</a>
            </form>
        </div>
    </div>

@endsection
