@extends('layouts.main')

@section('title')
    Editing {{ $session->title }}
@stop

@section('content')
    <h1>Editing {{ $session->title }}</h1>
    {{ Former::open(route('certifications.sessions.update', [$session->certification_id, $session->id]))->method('PUT')->rules(CourseSession::$rules) }}
    {{ Former::populate($session) }}
    @include('sessions.form')
@stop