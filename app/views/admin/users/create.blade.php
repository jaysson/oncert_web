@extends('layouts.admin')

@section('title')
New Certifications
@stop

@section('content')
<h1 class="page-header">New Certifications</h1>
{{ Former::openForFiles(route('admin.certifications.store'))->rules($rules) }}
{{ Former::text('title') }}
{{ Former::submit('Create')->class('btn btn-success btn-lg') }}
{{ Former::close() }}
@stop
