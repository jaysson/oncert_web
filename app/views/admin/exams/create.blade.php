@extends('layouts.admin')

@section('title')
    New Question
@stop

@section('content')
    <h1 class="page-header">New Question</h1>
    {{ Former::openForFiles(route('admin.exams.store'))->rules($rules) }}
    {{ Former::select('certification_id')->label('Certification Name')->options($certifications)}}
    {{ Former::text('name') }}
    {{ Former::text('duration') }}
    {{ Former::submit('Create')->class('btn btn-success btn-lg') }}
    {{ Former::close() }}
@stop
