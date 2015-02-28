@extends('layouts.main')

@section('title')
    Summary
@stop

@section('content')
    <h1>Welcome to Oncert!</h1>
    <p>Find certifications, get trained, take exams and get certified!</p>
    <div class="google_hangout" id="google_hangout">
        <h3 class="heading">Google Hangout with requestor</h3>

        <div id="placeholder-div"></div>
    </div>
    <script>
        (function () {
            var po = document.createElement('script');
            po.type = 'text/javascript';
            po.async = true;
            po.src = 'https://apis.google.com/js/platform.js?onload=renderButtons';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(po, s);
        })();
        function renderButtons() {
            gapi.hangout.render('placeholder-div', {
                'render': 'createhangout',
                'invites': "[{'id': 'amit.paul0025@gmail.com','invite_type': 'EMAIL'}]",
                'widget_size': 72
            });
        }
    </script>
@stop