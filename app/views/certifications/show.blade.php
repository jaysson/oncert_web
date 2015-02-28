@extends('layouts.main')

@section('title')
    {{ $certification->title }}
@stop

@section('content')
    <h1>{{ $certification->title }}</h1>
    {{ $certification->description }}
@stop