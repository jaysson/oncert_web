@extends('layouts.admin')

@section('title')
New Questions
@stop

@section('content')
<h1 class="page-header">New Questions</h1>
{{ Former::openForFiles(route('admin.exams.questions.store',$exam_id))->rules($rules) }}
{{ Former::text('title') }}
{{ Former::text('description') }}
{{ Former::radios('radio')
->radios(array(
'Active' => array('name' => 'status', 'value' => 1),
'Inactive' => array('name' => 'status', 'value' => 0),
))->check(1)}}
{{ Former::submit('Create')->class('btn btn-success btn-lg') }}
{{ Former::close() }}
@stop
