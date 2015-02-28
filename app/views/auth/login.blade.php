@extends('layouts.auth')

@section('title')
Login
@stop

@section('main')
{{ Former::open(route('login')) }}
{{ Former::email('email')->required() }}
{{ Former::password('password')->required() }}
{{ Former::submit('Login')->class('btn btn-success btn-block btn-lg') }}<br />
<a class="btn btn-small btn-info pull-right" href="/register">Register</a>
{{ Former::close() }}
@stop