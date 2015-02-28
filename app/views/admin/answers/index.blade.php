@extends('layouts.admin')

@section('title')
Answer
@stop

@section('content')
    <h1 class="page-header">Answers</h1>
    <a class="btn btn-primary btn-lg" href="{{route('admin.exams.questions.answers.create',array($question->exam_id,$question->id))}}">New Answer</a>
    <table class="table table-responsive table-striped table-bordered">
    <thead>
        <tr>
           
            <td>Title</td>
            <td>Correct</td>
            <td colspan="3">Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($answers as $id => $answer)
        <tr>
            <td>{{ $answer->title }}</td>
            <td>{{ $answer->correct }}</td>
            <td>
                <a class="btn btn-small btn-warning" href="{{ URL::route('admin.exams.questions.answers.edit', array($question->exam_id,$question->id,$answer->id))}}">Edit</a>
                <a class="btn btn-small btn-danger" href="{{ URL::route('admin.exams.questions.answers.destroy', array($question->exam_id,$question->id,$answer->id)) }}" data-method="delete" data-confirm="Are you sure?">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
@stop