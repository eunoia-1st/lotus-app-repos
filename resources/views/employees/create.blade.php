<h2>Tambah Karyawan Baru</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('employees.store') }}">
    @csrf

    <label for="name">Nama:</label><br>
    <input type="text" name="name" id="name" required><br><br>

    <label for="position">Posisi:</label><br>
    <select name="position" id="position" required>
        <option value="">-- Pilih Posisi --</option>
        <option value="office">Office</option>
        <option value="waiter">Waiter</option>
        <option value="cook">Cook</option>
        <option value="staff">Staff</option>
        <!-- Tambahkan opsi posisi lain sesuai kebutuhan -->
    </select><br><br>

    <button type="submit">Simpan</button>
</form>

<br>
<a href="{{ route('employees.index') }}">← Kembali ke Daftar</a>
