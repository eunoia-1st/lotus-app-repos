@extends('layouts.admin_layout')

@section('title', 'Daftar Karyawan')
@section('page-title', 'Daftar Karyawan')

@section('content')

    <a href="{{ route('employees.create') }}" class="btn btn-success mb-3">
        + Tambah Karyawan
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Posisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $emp)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $emp->name }}</td>
                    <td>{{ $emp->position }}</td>
                    <td>
                        <a href="{{ route('employees.details', $emp->id) }}" class="btn btn-sm btn-info">
                            Detail Shift
                        </a>
                        <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('employees.destroy', $emp->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
