@extends('layouts.admin')

@section('title')
Edit User
@stop

@section('content')
<h1 class="page-header">Edit User: </h1>
{{ Former::openForFiles(route('admin.users.update', $user->id))->method('patch') }}
{{ Former::populate($user)}}
{{ Former::text('name') }}
{{ Former::text('email') }}
{{ Former::password('password') }}
{{ Former::text('age') }}
{{ Former::text('address_1') }}
{{ Former::text('address_2') }}
{{ Former::text('city') }}
{{ Former::text('sate') }}
{{ Former::text('country') }}
{{ Former::text('zip_code') }}
{{ Former::text('contact_number') }}
{{ Former::file('profile_picture') }}
{{ Former::file('id_proof') }}
{{ Former::submit('Update')->class('btn btn-success btn-lg') }}
{{ Former::close() }}
@stop