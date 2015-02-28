@extends('layouts.admin')

@section('title')
Edit Exam
@stop

@section('content')
<h1 class="page-header">Edit Exam: </h1>
{{ Former::openForFiles(route('admin.exams.update', $exam->id))->method('patch') }}
{{ Former::populate($exam)}}
{{ Former::select('certification_id')->label('Certification Name')->options($certifications,$exam->certification_id)}}
{{ Former::text('name') }}
{{ Former::text('duration') }}
{{ Former::submit('Update')->class('btn btn-success btn-lg') }}
{{ Former::close() }}
@stop