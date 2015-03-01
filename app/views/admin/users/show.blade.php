@extends('layouts.admin')

@section('title')
{{$user->name}}
@stop

@section('content')
<h1 class="page-header">{{$user->name}}</h1>
name: {{$user->email}}<br />
name: {{$user->age}}<br />
name: {{$user->name}}<br />
name: {{$user->address_1}}<br />
name: {{$user->city}}<br />
name: {{$user->state}}<br />
name: {{$user->country}}<br />
name: {{$user->zip_code}}<br />
name: {{$user->contact_number}}<br />
Pofile Picture: <img src="{{ $user->profile_picture->url('small') }}" class="img-thumbnail" ><br />
Id Proof: <img src="{{ $user->id_proof->url('small') }}" class="img-thumbnail" ><br />
Created At: {{$user->created_at}}<br />
Updated At: {{$user->updated_at}}<br />
@stop