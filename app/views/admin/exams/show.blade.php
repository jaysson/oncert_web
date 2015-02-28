@extends('layouts.admin')

@section('title')
{{$exam->name}}
@stop

@section('content')
<h1 class="page-header">{{$exam->name}}</h1>
Certification Name: {{$exam->certification->title}}<br />
Created At: {{$exam->created_at}}<br />
Updated At: {{$exam->updated_at}}<br />

<table class="table table-responsive table-striped table-bordered">
    <thead>
    <tr>

        <td>Title</td>
        <td>Exam Name</td>
        <td colspan="3">Actions</td>
    </tr>
    </thead>
    <tbody>
    @foreach($exam->questions as $id => $examQuestion)
        <tr>
            <td>{{ $examQuestion->title }}</td>
            <td>{{ $examQuestion->exam->name }}</td>
            <td>
                <a class="btn btn-small btn-warning" href="{{ URL::route('admin.exams.questions.edit', array($exam->id,$examQuestion->id))}}">Edit</a>
                <a class="btn btn-small btn-warning" href="{{ URL::route('admin.exams.questions.answers.index', array($exam->id,$examQuestion->id))}}">Answer</a>
                <a class="btn btn-small btn-danger" href="{{ URL::route('admin.exams.questions.destroy', array($exam->id,$examQuestion->id)) }}" data-method="delete" data-confirm="Are you sure?">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop