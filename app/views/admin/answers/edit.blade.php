@extends('layouts.admin')

@section('title')
    Edit Question
@stop

@section('content')
    <h1 class="page-header">Edit Question: </h1>
    {{ Former::openForFiles(route('admin.exams.questions.answers.update', array($question->exam_id,$question->id,$answer->id)))->method('patch') }}
    {{ Former::populate($question)}}
    {{ Former::text('title') }}
    {{ Former::radios('radio')
  ->radios(array(
    'Inactive' => array('name' => 'correct', 'value' => 0),
    'Active' => array('name' => 'correct', 'value' => 1),
  )) }}
    {{ Former::submit('Update')->class('btn btn-success btn-lg') }}
    {{ Former::close() }}
@stop