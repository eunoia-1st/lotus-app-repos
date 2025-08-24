@extends('layouts.admin_layout')

@section('title', 'Daftar Pelanggan')
@section('page-title', 'Daftar Pelanggan')

@section('content')


    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $cust)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cust->name }}</td>
                    <td>{{ $cust->email }}</td>
                    <td>{{ $cust->phone }}</td>
                    <td>{{ $cust->address }}</td>
                    <td>
                        <a href="{{ route('customers.feedbacks', $cust->id) }}" class="btn btn-sm btn-info">Show</a>
                        <a href="{{ route('customers.edit', $cust->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="{{ route('customers.destroy', $cust->id) }}" class="d-inline">
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
