<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Untitled') | OnCert</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/bootstrap/bootstrap.css') }}

    <!-- Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>

    <!-- Base Styling  -->
    {{ HTML::style('css/app/app.v1.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<aside class="left-panel">
    {{ HTML::image('images/logo.png', null, ['class' => 'img-responsive']) }}
    <nav class="navigation">
        <ul class="list-unstyled">
            {{ HTML::navItem('<i class="fa fa-bookmark-o"></i><span class="nav-label">Dashboard</span>', route('dashboard')) }}
            {{ HTML::navItem('<i class="fa fa-power-off"></i><span class="nav-label">Logout</span>', route('logout')) }}
            {{ HTML::navItem('<i class="fa fa-power-off"></i><span class="nav-label"></span>', route('certifications.index')) }}
        </ul>
    </nav>

</aside>
<!-- Aside Ends-->

<section class="content">

    <div class="wrapper container-fluid">
        {{ Notification::showAll() }}
        @yield('content')
    </div>

</section>
<!-- Content Block Ends Here (right box)-->

<!-- JQuery v1.9.1 -->
{{ HTML::script('js/jquery/jquery-1.9.1.min.js') }}
{{ HTML::script('js/plugins/underscore/underscore-min.js') }}
<!-- Bootstrap -->
{{ HTML::script('js/bootstrap/bootstrap.min.js') }}

<!-- Globalize -->
{{ HTML::script('js/globalize/globalize.min.js') }}

<!-- NanoScroll -->
{{ HTML::script('js/plugins/nicescroll/jquery.nicescroll.min.js') }}

{{ HTML::script('js/laravel.js') }}

{{ HTML::script('js/app/custom.js') }}

</body>
</html>