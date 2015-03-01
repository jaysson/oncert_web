@extends('layouts.admin')

@section('title')
Users
@stop

@section('content')
    <h1 class="page-header">Users</h1>
    <a class="btn btn-primary btn-lg" href="{{route('admin.users.create')}}">New Users</a>
    <table class="table table-responsive table-striped table-bordered">
    <thead>
        <tr>
           
            <td>Name</td>
            <td>Email</td>
            <td colspan="3">Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $id => $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::route('admin.users.show', $user->id) }}">Show</a>
                <a class="btn btn-small btn-warning" href="{{ URL::route('admin.users.edit', $user->id)}}">Edit</a>
                <a class="btn btn-small btn-danger" href="{{ URL::route('admin.users.destroy', $user->id) }}" data-method="delete" data-confirm="Are you sure?">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    {{ $users->links() }}
@stop