@extends('auth')

@section('title')
Forgot Password
@stop

@section('main')
{{ Former::open(route('auth.process-forgot'))->method('patch') }}
{{ Former::email('email')->required() }}
{{ Former::submit('Send Password Reset Link')->class('btn btn-success btn-block btn-lg') }}
{{ Former::close() }}
<a class="btn btn-info pull-right" href="{{route('login')}}">Login</a>
@stop