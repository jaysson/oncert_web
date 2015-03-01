@extends('layouts.main')

@section('title')
    Attempt
@stop

@section('content')
    <h1>Attempting exam - {{ $attempt->exam->name }}</h1>
    @foreach($attempt->exam->questions as $question)
        <div class="panel panel-default">
            <div class="panel-heading">{{ $question->title }}</div>
            <div class="panel-body">
                {{ Former::open(route('certifications.exams.attempts.update', [$attempt->exam->certification->id, $attempt->exam->id,$attempt->id]))->class('background-submit') }}
                @foreach($question->answers as $answer)
                    <div class="form-group">
                        <label for="{{ $answer->id }}">
                            <input id="{{ $answer->id }}" name="answer_id" value="{{ $answer->id }}"
                                   class="control-group"
                                   type="radio"/>{{ $answer->title }}
                        </label>
                    </div>
                @endforeach
                {{ Former::close() }}
            </div>
        </div>
    @endforeach
    <a class="btn btn-warning btn-lg"
       href="{{ route('certifications.exams.attempts.index', [$attempt->exam->certification->id, $attempt->exam->id]) }}">Finish Exam</a>
    <script>
        $(document).ready(function () {
            $('form.background-submit input').on('change', function () {
                var url = $(this.form).attr('action')
                $.ajax({
                    url: url,
                    type: 'PUT',
                    data: $(this.form).serializeArray()
                });
            })
        })
    </script>
@stop