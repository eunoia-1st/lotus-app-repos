<h2>Edit Karyawan</h2>

<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nama:</label><br>
    <input type="text" id="name" name="name" value="{{ $employee->name }}" required><br><br>

    <label for="position">Posisi:</label><br>
    <select id="position" name="position" required>
        <option value="office" {{ $employee->position == 'office' ? 'selected' : '' }}>Office</option>
        <option value="cook" {{ $employee->position == 'cook' ? 'selected' : '' }}>Cook</option>
        <option value="waiter" {{ $employee->position == 'waiter' ? 'selected' : '' }}>Waiter</option>
        <option value="staff" {{ $employee->position == 'staff' ? 'selected' : '' }}>Staff</option>
    </select><br><br>

    <button type="submit">Simpan Perubahan</button>
</form>

<br>
<a href="{{ route('employees.index') }}">← Kembali ke Daftar</a>
