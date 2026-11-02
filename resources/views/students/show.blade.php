@extends('layouts.app')

@section('title', $student->name)

@section('content')
    <h1>{{ $student->name }}</h1>
    <dl>
        <dt>Roll number</dt><dd>{{ $student->roll_no }}</dd>
        <dt>Email</dt><dd>{{ $student->email }}</dd>
        <dt>Department</dt><dd>{{ $student->department }}</dd>
        <dt>Semester</dt><dd>{{ $student->semester }}</dd>
        <dt>CGPA</dt><dd>{{ $student->cgpa ?? 'Not provided' }}</dd>
    </dl>
    <a href="{{ route('students.index') }}">Back to students</a>
@endsection