<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Sidebar -->
    <nav class="bg-dark text-white p-3 position-fixed top-0 start-0 vh-100" style="width: 220px;">
        <h4 class="text-center">Admin Lotus Garden</h4>
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a href="{{ route('dashboard.main') }}" class="nav-link text-white">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('feedback-answers.index') }}" class="nav-link text-white">Feedbacks</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('question-categories.index') }}" class="nav-link text-white">Setting Feedback</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('customers.index') }}" class="nav-link text-white">Customers</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('employees.index') }}" class="nav-link text-white">Employees</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('feedback.categories') }}" class="nav-link text-white">Feedback's Page</a>
            </li>
            <li class="nav-item mt-3">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Content -->
    <div class="flex-grow-1 p-4" style="margin-left:220px;">
        <h2>@yield('page-title')</h2>
        <hr>
        @yield('content')
    </div>

</body>

</html>
