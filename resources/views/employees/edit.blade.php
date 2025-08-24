@extends('layouts.admin_layout')

@section('title', 'Edit Karyawan')
@section('page-title', 'Edit Karyawan')

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $employee->name }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label">Posisi:</label>
                    <select id="position" name="position" class="form-select" required>
                        <option value="office" {{ $employee->position == 'office' ? 'selected' : '' }}>Office</option>
                        <option value="cook" {{ $employee->position == 'cook' ? 'selected' : '' }}>Cook</option>
                        <option value="waiter" {{ $employee->position == 'waiter' ? 'selected' : '' }}>Waiter</option>
                        <option value="staff" {{ $employee->position == 'staff' ? 'selected' : '' }}>Staff</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">← Kembali</a>
            </form>
        </div>
    </div>

@endsection
