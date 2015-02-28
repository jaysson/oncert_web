@extends('layouts.admin')

@section('title')
Questions
@stop

@section('content')
    <h1 class="page-header">Questions</h1>
    <a class="btn btn-primary btn-lg" href="{{route('admin.questions.create')}}">New Questions</a>
    <table class="table table-responsive table-striped table-bordered">
    <thead>
        <tr>
           
            <td>Title</td>
            <td>Exam Name</td>
            <td colspan="3">Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($questions as $id => $question)
        <tr>
            <td>{{ $question->title }}</td>
            <td>{{ $question->exam->name }}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::route('admin.questions.show', $question->id) }}">Show</a>
                <a class="btn btn-small btn-warning" href="{{ URL::route('admin.questions.edit', $question->id)}}">Edit</a>
                <a class="btn btn-small btn-warning" href="{{ URL::route('admin.questions.answers.index', $question->id)}}">Answer</a>
                <a class="btn btn-small btn-danger" href="{{ URL::route('admin.questions.destroy', $question->id) }}" data-method="delete" data-confirm="Are you sure?">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    {{ $questions->links() }}
@stop