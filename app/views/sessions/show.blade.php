@extends('layouts.main')

@section('title')
    {{ $session->title }}
@stop

@section('content')
    <h1>{{ $session->title }}</h1>
    <p><strong>Start:</strong> {{ $session->start }}</p>
    <p><strong>End</strong> {{ $session->end }}</p>
    <div class="google_hangout" id="google_hangout">
        <h3 class="heading">Start Video Session</h3>

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
                'invites': [
                    @foreach($session->users as $user)
                    {'id': '{{ $user->email }}}', 'invite_type': 'EMAIL'}
                    @endforeach
            ],
                'widget_size': 72
            });
        }
    </script>
@stop