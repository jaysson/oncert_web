@extends('layouts.admin')

@section('title')
Certifications
@stop

@section('content')
    <h1 class="page-header">Certifications</h1>
    <a class="btn btn-primary btn-lg" href="{{route('admin.certifications.create')}}">New Certifications</a>
    <table class="table table-responsive table-striped table-bordered">
    <thead>
        <tr>
           
            <td>Title</td>

            <td colspan="3">Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($certifications as $id => $certification)
        <tr>
            <td>{{ $certification->title }}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::route('admin.certifications.show', $certification->id) }}">Show</a>
                <a class="btn btn-small btn-warning" href="{{ URL::route('admin.certifications.edit', $certification->id)}}">Edit</a>
                <a class="btn btn-small btn-danger" href="{{ URL::route('admin.certifications.destroy', $certification->id) }}" data-method="delete" data-confirm="Are you sure?">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    {{ $certifications->links() }}
@stop