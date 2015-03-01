@extends('layouts.main')

@section('title')
    Certifications
@stop

@section('content')
    <h1>Certifications</h1>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th colspan="4">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($certifications as $certification)
            <tr>
                <td>{{ $certification->title }}</td>
                <td>{{ link_to_route('certifications.show', 'Details', $certification->id) }}</td>
                <td>{{ link_to_route('certifications.sessions.index', 'Sessions', $certification->id) }}</td>
                <td>{{ link_to_route('certifications.exams.index', 'Exams', $certification->id) }}</td>
                <td>{{ link_to_route('certifications.sessions.create', 'Take Session', $certification->id) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop