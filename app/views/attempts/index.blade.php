@extends('layouts.main')

@section('title')
    Attempts for {{ $exam->name }}
@stop

@section('content')
    <h1>Attempts for {{ $exam->name }}</h1>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Started At</th>
            <th>Correct</th>
            <th>Incorrect</th>
            <th>Skipped</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attempts as $attempt)
            <tr>
                <td>{{ $attempt->start }}</td>
                <td>{{ $attempt->correct }}</td>
                <td>{{ $attempt->incorrect }}</td>
                <td>{{ $attempt->skipped }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop