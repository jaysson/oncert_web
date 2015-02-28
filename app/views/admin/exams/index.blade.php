@extends('layouts.admin')

@section('title')
Exams
@stop

@section('content')
    <h1 class="page-header">Exams</h1>
    <a class="btn btn-primary btn-lg" href="{{route('admin.exams.create')}}">New Exam</a>
    <table class="table table-responsive table-striped table-bordered">
    <thead>
        <tr>
           
            <td>Title</td>
            <td>Certification Name</td>
            <td colspan="3">Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($exams as $id => $exam)
        <tr>
            <td>{{ $exam->name }}</td>
            <td>{{ $exam->certification->title }}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::route('admin.exams.show', $exam->id) }}">Show</a>
                <a class="btn btn-small btn-warning" href="{{ URL::route('admin.exams.edit', $exam->id)}}">Edit</a>
                <a class="btn btn-small btn-danger" href="{{ URL::route('admin.exams.destroy', $exam->id) }}" data-method="delete" data-confirm="Are you sure?">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    {{ $exams->links() }}
@stop