@extends('layouts.customer_layout')

@section('title', 'Form Feedback')
@section('header', 'Form Feedback - ' . ($category->name ?? 'Kategori'))

@section('content')
    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div style="color:red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('feedback.submit', $category->id) }}" method="POST"
        style="display: flex; flex-direction: column; gap: 15px;">
        @csrf

        {{-- Data Pribadi --}}
        <h3>Data Pribadi</h3>
        <div style="display: flex; flex-direction: column; gap: 8px;">
            <label>Nama (opsional)</label>
            <input type="text" name="name" value="{{ old('name') }}"
                style="padding:8px; border-radius:6px; border:1px solid #ccc;">

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                style="padding:8px; border-radius:6px; border:1px solid #ccc;">

            <label>Nomor Telepon</label>
            <input type="text" name="phone" value="{{ old('phone') }}"
                style="padding:8px; border-radius:6px; border:1px solid #ccc;">

            <label>Alamat</label>
            <textarea name="address" rows="3" placeholder="Tuliskan Alamat Anda . . ."
                style="padding:8px; border-radius:6px; border:1px solid #ccc;">{{ old('address') }}</textarea>
        </div>

        {{-- Pilih Seat --}}
        <h3>Pilih Seat</h3>
        <select name="seat_id" required style="padding:8px; border-radius:6px; border:1px solid #ccc;">
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
                        <label style="display:block; margin-bottom:5px;">
                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}"
                                {{ old("answers.{$question->id}") == $option->question_value ? 'checked' : '' }}>
                            {{ $option->question_value }}
                        </label>
                    @endforeach
                @endif

                {{-- Checkbox --}}
                @if ($question->question_type === 'checkbox')
                    @foreach ($question->question_options as $option)
                        <label style="display:block; margin-bottom:5px;">
                            <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $option->id }}"
                                {{ is_array(old("answers.{$question->id}")) && in_array($option->question_value, old("answers.{$question->id}")) ? 'checked' : '' }}>
                            {{ $option->question_value }}
                        </label>
                    @endforeach
                @endif

                {{-- Text --}}
                @if ($question->question_type === 'text')
                    <textarea name="answers[{{ $question->id }}]" rows="3" placeholder="Tuliskan jawaban Anda di sini..."
                        style="padding:8px; border-radius:6px; border:1px solid #ccc;">{{ old("answers.{$question->id}") }}</textarea>
                @endif
            </div>
        @endforeach

        {{-- Tombol Kirim dan Cancel --}}
        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <button type="submit"
                style="flex:1; padding:10px; background-color:#5C4033; color:white; border:none; border-radius:6px;">Kirim
                Feedback</button>
            <a href="{{ route('feedback.categories') }}"
                style="flex:1; padding:10px; background-color:#ccc; color:black; text-align:center; text-decoration:none; border-radius:6px;">Cancel</a>
        </div>
    </form>
@endsection
