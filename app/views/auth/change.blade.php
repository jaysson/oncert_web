@extends('auth')

@section('title')
Change Password
@stop

@section('main')
{{ Former::open(route('auth.process-change'))->method('patch') }}
{{ Former::password('oldpassword')->required() }}
{{ Former::password('newpassword')->required() }}
{{ Former::password('confirmpassword')->required() }}
{{ Former::submit('Change') }}
{{ Former::close() }}
@stop