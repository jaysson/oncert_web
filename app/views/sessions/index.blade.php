@extends('layouts.main')

@section('title')
    Sessions for {{ $certification->title }}
@stop

@section('content')
    <h1>Sessions for {{ $certification->title }}</h1>
    <a class="btn btn-success" href="{{ route('certifications.sessions.create', $certification->id) }}">Add Session</a>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Trainer</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sessions as $session)
            <tr>
                <td>{{ $session->title }}</td>
                <td>{{ $session->trainer->name }}</td>
                <td>{{ link_to_route('certifications.sessions.show', 'Details', [$certification->id, $session->id]) }}</td>
                <td>{{ link_to_route('certifications.sessions.edit', 'Edit', [$certification->id, $session->id]) }}</td>
                <td>{{ link_to_route('join-session', 'Join Session', $session->id) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop