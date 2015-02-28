@extends('layouts.admin')

@section('title')
{{$question->title}}
@stop

@section('content')
<h1 class="page-header">{{$question->title}}</h1>
Exam Name: {{$question->exam->name}}<br />
Description: {{$question->description}}<br />
Status :  {{  $question->status }}
Created At: {{$question->created_at}}<br />
Updated At: {{$question->updated_at}}<br />
@stop