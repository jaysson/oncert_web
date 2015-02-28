@extends('layouts.admin')

@section('title')
New Answer
@stop

@section('content')
<h1 class="page-header">New Answer</h1>
{{ Former::openForFiles(route('admin.exams.questions.answers.store',array($exam_id,$question_id)))->rules($rules) }}
{{ Former::text('title') }}
{{ Former::radios('radio')
->radios(array(
'Correct' => array('name' => 'correct', 'value' => 1),
'Incorrect' => array('name' => 'correct', 'value' => 0),
))->check(1)}}
{{ Former::submit('Create')->class('btn btn-success btn-lg') }}
{{ Former::close() }}
@stop
