<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Customer Page')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Reset default margin/padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            font-family: 'Arial', sans-serif;
            background-color: #FFF8F0;
            /* krem elegan */
            overflow: hidden;
            /* hilangkan scroll */
        }

        body {
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #5C4033;
            /* cokelat gelap */
            color: #fff;
            text-align: center;
            padding: 15px;
            flex: 0 0 auto;
            /* tetap tinggi header */
        }

        main {
            flex: 1 1 auto;
            /* isi seluruh ruang tersisa */
            overflow-y: auto;
            /* scroll internal jika konten banyak */
            padding: 15px;
        }

        footer {
            background-color: #5C4033;
            color: #fff;
            text-align: center;
            padding: 10px;
            flex: 0 0 auto;
            /* tetap tinggi footer */
            font-size: 12px;
        }

        /* Link navigasi ala mobile */
        nav {
            display: flex;
            justify-content: space-around;
            background-color: #8B5E3C;
            /* cokelat terang */
            padding: 10px 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            nav {
                flex-direction: row;
                justify-content: space-around;
            }

            main {
                padding: 10px;
            }

            header,
            footer {
                padding: 12px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>@yield('header', 'Lotus Garden')</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; 2025 Lotus Garden. All Rights Reserved.
    </footer>

</body>

</html>
