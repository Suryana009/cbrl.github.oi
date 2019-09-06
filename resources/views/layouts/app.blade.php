<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CBR Laravel 5.4</title>

    <!-- Styles -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('datatables/dataTables.bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('icon/laravel-226015.png') }}" rel="shortcut icon" />

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if (Auth::guest())
                        <a class="navbar-brand" href="{{ url('/') }}">
                            CBR Laravel
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            CBR Laravel
                        </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('diagnose') }}">@lang('general.diagnose')</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ App\Languages::get_language_name(app()->getLocale()) }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @foreach( App\Languages::get_all_language() as $language )
                                        <li><a href="{{ route('change_lang', ['lang' => $language->code ]) }}">{{ $language->language }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li><a href="{{ url('login') }}">@lang('general.login')</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    @lang('general.cbr') <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('symptom') }}">@lang('general.symptom')</a></li>
                                    <li><a href="{{ url('disease') }}">@lang('general.disease')</a></li>
                                    <li><a href="{{ url('case') }}">@lang('general.case')</a></li>
                                    <li><a href="{{ url('solution') }}">@lang('general.solution')</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    @lang('general.language') <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <li><a href="{{ url('keyword') }}">@lang('general.keyword')</a></li>
                                        <li><a href="{{ url('language') }}">@lang('general.language')</a></li>
                                        <li><a href="{{ url('vocabulary') }}">@lang('general.vocabulary')</a></li>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ App\Languages::get_language_name(app()->getLocale()) }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @foreach( App\Languages::get_all_language() as $language )
                                        <li><a href="{{ route('change_lang', ['lang' => $language->code ]) }}">{{ $language->language }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li><a href="{{ url('user') }}">@lang('general.user')</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a onclick="logout()">@lang('general.logout')</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('jquery/jquery-2.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
    function logout()
    {
        swal.fire({
            title: "@lang('general.confirmation')",
            text: "@lang('general.confirm_logout') ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "@lang('general.yes')",
            cancelButtonText: "@lang('general.no')",
            }).then((result) => {
            if (result.value) {
                location.href = 'logout';
            }
        });
    }
    </script>
</body>
</html>
