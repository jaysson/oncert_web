@extends('layouts.main')

@section('title')
    Add a session
@stop

@section('content')
    <h1>Add a session</h1>
    {{ Former::open(route('certifications.sessions.store', [$certification->id]))->rules(CourseSession::$rules) }}
    @include('sessions.form')
@stop