@extends('layouts.main')

@section('title')
    Exams
@stop

@section('content')
    <h1>Exams</h1>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Duration</th>
            <th colspan="4">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exams as $exam)
            <tr>
                <td>{{ $exam->name }}</td>
                <td>{{ $exam->duration }} minutes</td>
                <td>{{ link_to_route('certifications.exams.attempts.index', 'Attempts', [$exam->certification_id, $exam->id], ['class' => 'btn btn-info']) }}</td>
                <td>
                    {{ Former::open(route('certifications.exams.attempts.store', [$exam->certification_id, $exam->id])) }}
                    {{ Former::submit('Attempt') }}
                    {{ Former::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop