<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Students')</title>
</head>
<body>
    <nav>
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('students.create') }}">Add student</a>
        <a href="{{ route('about') }}">About</a>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>