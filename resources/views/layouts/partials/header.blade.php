<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ABAC') }}</title>
    @php($meta = \App\Metadato::all())
    @foreach($meta as $m)
        @if(request()->path() == $m->url)
    <meta name="description" content="{!! $m->descripcion !!}" />
    <meta name="keywords" content="{{ $m->keyword }}" />
        @endif
    @endforeach
    <meta name="keywords" content=" @yield('meta') " />

    <script>
        document.__API_URL = '{{ url('/') }}';
    </script>
    @include('layouts.partials.links')
    <!---------- MAILCHIMP------------>
    <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us13.list-manage.com","uuid":"6931f867171f1b41f99b026d5","lid":"0b91e98f8c","uniqueMethods":true}) })</script>
<!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '6aafb7014b9c63e1d5c3cfb73f2dd14e234a1c4a';
        window.smartsupp||(function(d) {
            var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
            s=d.getElementsByTagName('script')[0];c=d.createElement('script');
            c.type='text/javascript';c.charset='utf-8';c.async=true;
            c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
    </script>

</head>
<body>
    
    <header id="header">
        @if(request()->is('privada*'))
            @include('layouts.partials.privadanavbar')
        @else
            @include('layouts.partials.navbar')
        @endif

    </header>