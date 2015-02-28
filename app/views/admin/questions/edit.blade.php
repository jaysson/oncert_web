@extends('layouts.admin')

@section('title')
    Edit Question
@stop

@section('content')
    <h1 class="page-header">Edit Question: </h1>
    {{ Former::openForFiles(route('admin.exams.questions.update', array($question->exam_id,$question->id)))->method('patch') }}
    {{ Former::populate($question)}}
    {{ Former::text('title') }}
    {{ Former::text('description') }}
    {{ Former::radios('radio')
    ->radios(array(
    'Active' => array('name' => 'status', 'value' => 1),
    'Inactive' => array('name' => 'status', 'value' => 0),
    ))}}
    {{ Former::submit('Update')->class('btn btn-success btn-lg') }}
    {{ Former::close() }}
@stop