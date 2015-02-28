@extends('layouts.admin')

@section('title')
Edit Certification
@stop

@section('content')
<h1 class="page-header">Edit Certifications: </h1>
{{ Former::openForFiles(route('admin.certifications.update', $certification->id))->method('patch') }}
{{ Former::populate($certification)}}
{{ Former::text('title') }}
{{ Former::submit('Update')->class('btn btn-success btn-lg') }}
{{ Former::close() }}
@stop