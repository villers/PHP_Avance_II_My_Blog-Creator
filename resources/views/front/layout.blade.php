<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>{{ trans('front/site.title') }}</title>
    <meta name="description" content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">

    @yield('head')

    {!! Html::style('bower_components/semantic/dist/semantic.min.css') !!}
    {!! Html::style('css/app.css') !!}
</head>
<body>
    <nav class="ui fixed menu inverted navbar">
        {!! link_to('/', trans('front/site.title'), ['class' => 'brand item']) !!}
        {!! link_to('/', trans('front/site.home'), ['class' => 'item']) !!}
        @if(!Auth::check())
            {!! link_to('auth/login', trans('front/site.login'), ['class' => 'item']) !!}
            {!! link_to('auth/register', trans('front/site.register'), ['class' => 'item']) !!}
        @else
            {!! link_to('auth/logout', trans('front/site.logout'), ['class' => 'item']) !!}
        @endif
    </nav>

    <main class="ui page grid">
        <div class="row">
            <div class="center aligned starter column">
                @if(session()->has('ok'))
                    @include('partials/error', ['type' => 'positive', 'message' => session('ok')])
                @endif
                @if(isset($info))
                    @include('partials/error', ['type' => 'negative', 'message' => $info])
                @endif
                @yield('main')
            </div>
        </div>
    </main>

    {!! Html::script('bower_components/jquery/dist/jquery.js') !!}
    {!! Html::script('bower_components/semantic/dist/semantic.js') !!}
    {!! Html::script('js/app.js') !!}
    @yield('scripts')
</body>
</html>