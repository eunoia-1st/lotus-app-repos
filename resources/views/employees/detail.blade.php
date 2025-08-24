@extends('layouts.admin_layout')

@section('title', 'Edit Shift Mingguan')
@section('page-title', "Edit Detail Mingguan: {$employee->name}")

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('employees.updateDetails', $employee->id) }}">
                @csrf
                @method('PUT')

                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
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
                                    <td class="fw-bold">{{ ucfirst($detail->day) }}</td>
                                    <td>
                                        <input type="time" name="detail[{{ $detail->day }}][start_time]"
                                            value="{{ $detail->start_time }}" class="form-control start-time"
                                            data-day="{{ $detail->day }}">
                                    </td>
                                    <td>
                                        <input type="time" name="detail[{{ $detail->day }}][end_time]"
                                            value="{{ $detail->end_time }}" class="form-control end-time"
                                            data-day="{{ $detail->day }}">
                                    </td>
                                    <td>
                                        <select name="detail[{{ $detail->day }}][shift_type]"
                                            class="form-select shift-type" data-day="{{ $detail->day }}">
                                            <option value="">-- Pilih / Libur --</option>
                                            <option value="morning"
                                                {{ $detail->shift_type == 'morning' ? 'selected' : '' }}>Morning</option>
                                            <option value="evening"
                                                {{ $detail->shift_type == 'evening' ? 'selected' : '' }}>Evening</option>
                                            <option value="split" {{ $detail->shift_type == 'split' ? 'selected' : '' }}>
                                                Split</option>
                                            <option value="middle" {{ $detail->shift_type == 'middle' ? 'selected' : '' }}>
                                                Middle</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="detail[{{ $detail->day }}][is_off]"
                                            class="form-check-input off-day-toggle" data-day="{{ $detail->day }}"
                                            {{ !$detail->start_time && !$detail->end_time && !$detail->shift_type ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-primary">💾 Simpan Semua</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">← Kembali</a>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.off-day-toggle').forEach(cb => {
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

                toggleFields();
                cb.addEventListener('change', toggleFields);
            });
        });
    </script>
@endpush
