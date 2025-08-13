<h1>Daftar Pelanggan</h1>

<table>
    <thead>
        <tr>
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
                <td>{{ $cust->name }}</td>
                <td>{{ $cust->email }}</td>
                <td>{{ $cust->phone }}</td>
                <td>{{ $cust->address }}</td>
                <td>
                    <a href="#">Show</a>
                    <a href="{{ route('customers.edit', $cust->id) }}">Edit</a>
                    <form method="POST" action="{{ route('customers.destroy', $cust->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
