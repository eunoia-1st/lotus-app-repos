<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Form Feedback</title>
</head>

<body>

    <h2>Form Feedback - {{ $category->name ?? 'Kategori' }}</h2>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('feedback.submit', $category->id) }}" method="POST">
        @csrf

        {{-- Data Pribadi --}}
        <h3>Data Pribadi</h3>
        <div>
            <label>Nama (opsional)</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label>Nomor Telepon</label><br>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </div>

        <div>
            <label>Alamat</label><br>
            <textarea name="address" rows="3" placeholder="Tuliskan Alamat Anda . . .">{{ old('address') }}</textarea>
        </div>

        {{-- Pilih Seat --}}
        <h3>Pilih Seat</h3>
        <select name="seat_id" required>
            <option value="">-- Pilih Seat --</option>
            @foreach ($seats as $seat)
                <option value="{{ $seat->id }}" {{ old('seat_id') == $seat->id ? 'selected' : '' }}>
                    {{ $seat->name }}
                </option>
            @endforeach
        </select>

        {{-- Pertanyaan Feedback --}}
        <h3>Pertanyaan</h3>
        @foreach ($questions as $question)
            <div style="margin-bottom:15px;">
                <p><strong>{{ $question->question_text }}</strong></p>

                {{-- Radio --}}
                @if ($question->question_type === 'option')
                    @foreach ($question->question_options as $option)
                        <label>
                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}"
                                {{ old("answers.{$question->id}") == $option->question_value ? 'checked' : '' }}>
                            {{ $option->question_value }}
                        </label><br>
                    @endforeach
                @endif

                {{-- Checkbox --}}
                @if ($question->question_type === 'checkbox')
                    @foreach ($question->question_options as $option)
                        <label>
                            <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $option->id }}"
                                {{ is_array(old("answers.{$question->id}")) && in_array($option->question_value, old("answers.{$question->id}")) ? 'checked' : '' }}>
                            {{ $option->question_value }}
                        </label><br>
                    @endforeach
                @endif

                {{-- Text --}}
                @if ($question->question_type === 'text')
                    <textarea name="answers[{{ $question->id }}]" rows="3" placeholder="Tuliskan jawaban Anda di sini...">{{ old("answers.{$question->id}") }}</textarea>
                @endif
            </div>
        @endforeach

        <button type="submit">Kirim Feedback</button>
    </form>

</body>

</html>
