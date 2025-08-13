<!DOCTYPE html>
<html>

<head>
    <title>Pilih Kategori Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .category-card {
            display: block;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            text-decoration: none;
            color: black;
        }

        .category-card:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <h2>Pilih Kategori Feedback</h2>

    @if ($categories->isEmpty())
        <p>Tidak ada kategori feedback yang tersedia saat ini.</p>
    @else
        @foreach ($categories as $category)
            <a href="{{ route('feedback.questions', $category->id) }}" class="category-card">
                {{ $category->name }}
            </a>
        @endforeach
    @endif
</body>

</html>
