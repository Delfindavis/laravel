@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <h1>Students</h1>

    @if (session('status'))
        <p role="status">{{ session('status') }}</p>
    @endif

    <p><a href="{{ route('students.create') }}">Add student</a></p>
    <table>
        <thead>
            <tr>
                <th>Roll number</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td><a href="{{ route('students.show', $student) }}">{{ $student->roll_no }}</a></td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection