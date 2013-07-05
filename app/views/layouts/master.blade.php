<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>

        <title>@yield('title')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="{{ URL::asset( 'packages/bootstrap/css/bootstrap.css' ) }}">
        <!-- Responsiveness later! First lets focus on getting this ready. -->
        <!--<link rel="stylesheet" href="{{ URL::asset( 'packages/bootstrap/css/bootstrap-responsive.css' ) }}">-->
        <link rel="stylesheet" href="{{ URL::asset( 'css/beardcms.css' ) }}">

        @yield('css')

    </head>
    <body>

        <div class="row">
            <div class="span12">
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container">
                            <a class="brand" href="#">BeardCMS</a>
                            <ul class="nav">
                                @foreach( $navitems as $item )
                                    <li @if($item->isActive())class="active"@endif><a href="{{ $item->url }}" title="{{ $item->title }}">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="content">

            @yield('content')

        </div>

        <footer>
            &copy; 2013 Bearded Robot
        </footer>

        <script src="{{ URL::asset( 'packages/jquery/js/jquery-2.0.2.js' ) }}"></script>
        <script src="{{ URL::asset( 'packages/bootstrap/js/bootstrap.js' ) }}"></script>

        @yield('js')

    </body>
</html>