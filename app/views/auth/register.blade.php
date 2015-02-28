@extends('layouts.auth')

@section('title')
    Register
@stop

@section('main')
    {{ Former::open(route('register')) }}
    {{ Former::text('name')->required() }}
    {{ Former::email('email')->required() }}
    {{ Former::password('password')->required() }}
    {{ Former::submit('Register')->class('btn btn-success btn-block btn-lg') }}<br />
    <a class="btn btn-small btn-info pull-right" href="/login">Login</a>
    {{ Former::close() }}
@stop