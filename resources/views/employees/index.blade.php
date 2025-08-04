<h1>Daftar Karyawan</h1>

<a href="{{ route('employees.create') }}">Tambah Karyawan</a>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Posisi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $emp)
            <tr>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->position }}</td>
                <td>
                    <a href="{{ route('employees.details', $emp->id) }}">Detail Shift</a>
                    <a href="{{ route('employees.edit', $emp->id) }}">Edit</a>
                    <form method="POST" action="{{ route('employees.destroy', $emp->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
