<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>

        <title>@yield('title')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="{{ URL::asset( 'css/vendor/bootstrap/bootstrap.css' ) }}">
        <link rel="stylesheet" href="{{ URL::asset( 'css/vendor/fontawesome/font-awesome.css' ) }}">
        <link rel="stylesheet" href="{{ URL::asset( 'css/vendor/ladda/ladda.css' ) }}">
        <link rel="stylesheet" href="{{ URL::asset( 'css/beardcms.css' ) }}">

        @yield('css')

    </head>
    <body>
        <!-- Nav Bar -->
        @section('navbar')
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">BeardCMS</a>
                <div class="nav-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        @foreach( $navitems as $item )
                        <li @if($item->isActive())class="active"@endif><a href="{{ $item->url }}" title="{{ $item->title }}">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                    @if(Sentry::check())
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Sentry::getUser()->first_name }} {{ Sentry::getUser()->last_name }} <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <!-- Put in some user specific links here, such as change details/password/email etc... -->
                                <li class="divider"></li>
                                <li><a target="_self" href="/admin/logout"><i class="icon-off"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        @show
        <!-- /Nav Bar -->

        <!-- Messages -->
        @if(Session::has('message'))
        <div class="alert @if(Session::has('message-type')) {{ Session::get('message-type') }} @endif container">
            {{ Session::get('message') }} <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        @endif

        <!-- Content -->
        <div id="content">

            @yield('content')

        </div>
        <!-- /Content -->

        <!--<footer class="container">
            &copy; 2013 Bearded Robot
        </footer>-->

        <script src="{{ URL::asset( 'js/vendor/jquery/jquery-2.0.2.js' ) }}"></script>
        <script src="{{ URL::asset( 'js/vendor/bootstrap/bootstrap.js' ) }}"></script>
        <script src="{{ URL::asset( 'js/vendor/ladda/spin.js' ) }}"></script>
        <script src="{{ URL::asset( 'js/vendor/ladda/ladda.js' ) }}"></script>
        <script>
            Ladda.bind(".ladda-button", {
                timeout: 3000
            })
        </script>

        @yield('js')

    </body>
</html>