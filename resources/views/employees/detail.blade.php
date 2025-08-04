<h2>Edit Detail Mingguan: {{ $employee->name }}</h2>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('employees.updateDetails', $employee->id) }}">
    @csrf
    @method('PUT')

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Tipe Shift</th>
                <th>Libur?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr>
                    <td>{{ ucfirst($detail->day) }}</td>
                    <td>
                        <input type="time" name="detail[{{ $detail->day }}][start_time]"
                            value="{{ $detail->start_time }}" class="start-time" data-day="{{ $detail->day }}">
                    </td>
                    <td>
                        <input type="time" name="detail[{{ $detail->day }}][end_time]"
                            value="{{ $detail->end_time }}" class="end-time" data-day="{{ $detail->day }}">
                    </td>
                    <td>
                        <select name="detail[{{ $detail->day }}][shift_type]" class="shift-type"
                            data-day="{{ $detail->day }}">
                            <option value="">-- Pilih / Libur --</option>
                            <option value="morning" {{ $detail->shift_type == 'morning' ? 'selected' : '' }}>Morning
                            </option>
                            <option value="evening" {{ $detail->shift_type == 'evening' ? 'selected' : '' }}>Evening
                            </option>
                            <option value="split" {{ $detail->shift_type == 'split' ? 'selected' : '' }}>Split
                            </option>
                            <option value="middle" {{ $detail->shift_type == 'middle' ? 'selected' : '' }}>Middle
                            </option>
                        </select>
                    </td>
                    <td>
                        <input type="checkbox" name="detail[{{ $detail->day }}][is_off]" class="off-day-toggle"
                            data-day="{{ $detail->day }}"
                            {{ !$detail->start_time && !$detail->end_time && !$detail->shift_type ? 'checked' : '' }}>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <button type="submit">Simpan Semua</button>
</form>

<br>
<a href="{{ route('employees.index') }}">← Kembali ke Daftar</a>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.off-day-toggle');

        checkboxes.forEach(cb => {
            const day = cb.dataset.day;
            const start = document.querySelector(`.start-time[data-day="${day}"]`);
            const end = document.querySelector(`.end-time[data-day="${day}"]`);
            const shift = document.querySelector(`.shift-type[data-day="${day}"]`);

            function toggleFields() {
                const isChecked = cb.checked;
                start.disabled = isChecked;
                end.disabled = isChecked;
                shift.disabled = isChecked;

                if (isChecked) {
                    start.value = '';
                    end.value = '';
                    shift.value = '';
                }
            }

            // Inisialisasi saat halaman dimuat
            toggleFields();

            // Event listener saat checkbox diubah
            cb.addEventListener('change', toggleFields);
        });
    });
</script>
