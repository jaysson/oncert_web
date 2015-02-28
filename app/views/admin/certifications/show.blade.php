@extends('layouts.admin')

@section('title')
{{$certification->title}}
@stop

@section('content')
<h1 class="page-header">{{$certification->title}}</h1>
Title: {{$certification->title}}<br />
Created At: {{$certification->created_at}}<br />
Updated At: {{$certification->updated_at}}<br />
@stop