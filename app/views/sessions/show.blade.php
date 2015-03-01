@extends('layouts.main')

@section('title')
    {{ $session->title }}
@stop

@section('content')
    <h1>{{ $session->title }}</h1>
    <p><strong>Start:</strong> {{ $session->start }}</p>
    <p><strong>End</strong> {{ $session->end }}</p>
    <hr class="dotted"/>
    <h4>Attachments</h4>
    <ul>
        @foreach($session->attachments as $attachment)
            <li>{{ link_to($attachment->file->url(), $attachment->file_file_name) }}</li>
        @endforeach
    </ul>
    {{ Former::openForFiles(route('certifications.sessions.attachments.store', [$session->certification_id, $session->id])) }}
    {{ Former::file('file') }}
    {{ Former::submit('Upload') }}
    {{ Former::close() }}
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