@extends('auth')

@section('title')
Reset Password
@stop

@section('main')
{{ Former::open(route('auth.process-reset'))->method('patch') }}
{{ Former::password('password')->required() }}
{{ Former::password('password_confirmation')->required() }}
{{ Former::hidden('reset_code')->value($resetCode) }}
{{ Former::submit('Change Password')->class('btn btn-success btn-block btn-lg') }}
{{ Former::close() }}
@stop