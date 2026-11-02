@extends('layouts.app')

@section('title', 'Add student')

@section('content')
    <h1>Add student</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <p><label>Roll number <input name="roll_no" value="{{ old('roll_no') }}" required></label></p>
        <p><label>Name <input name="name" value="{{ old('name') }}" required></label></p>
        <p><label>Email <input type="email" name="email" value="{{ old('email') }}" required></label></p>
        <p><label>Department <input name="department" value="{{ old('department', 'CSE') }}"></label></p>
        <p><label>Semester <input type="number" name="semester" min="1" max="12" value="{{ old('semester', 7) }}"></label></p>
        <p><label>CGPA <input type="number" name="cgpa" min="0" max="10" step="0.01" value="{{ old('cgpa') }}"></label></p>
        <button type="submit">Save student</button>
    </form>
@endsection