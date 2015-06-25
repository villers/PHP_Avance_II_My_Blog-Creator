<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>{{ trans('front/site.sitetitle') }}</title>
    <meta name="description" content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">

    @yield('head')

    {!! Html::style('bower_components/semantic/dist/semantic.min.css') !!}
    {!! Html::style('css/app.css') !!}
</head>
<body>
    <nav class="ui fixed menu inverted navbar">
        {!! HTML::linkRoute('blog.index', trans('front/site.sitetitle'), [], ['class' => 'brand item']) !!}
        {!! HTML::linkRoute('blog.home', trans('front/site.home'), [], ['class' => 'item']) !!}

        @if(!Auth::check())
            {!! link_to('auth/login', trans('front/site.login'), ['class' => 'item']) !!}
            {!! link_to('auth/register', trans('front/site.register'), ['class' => 'item']) !!}
        @else
            {!! HTML::linkRoute('blog.user.index', trans('front/site.myblogs'), ['login' => Auth::user()->name], ['class' => 'item']) !!}
            {!! HTML::linkRoute('blog.user.admin.index', trans('front/site.admin'), ['login' => Auth::user()->name], ['class' => 'item']) !!}
            {!! link_to('auth/logout', trans('front/site.logout'), ['class' => 'item']) !!}
        @endif

        <div class="right menu">
            <form action="{{ route('blog.search') }}" class="item">
                    <div class="ui icon input">
                        <input type="text" name="search" placeholder="{{trans('front/site.search')}}">
                        <i class="search link icon"></i>
                    </div>
            </form>
            <div class="ui dropdown item">
                {{ trans('front/site.languague') }}
                <i class="dropdown icon"></i>
                <div class="menu">
                    {!! link_to('language?locale=en', trans('front/site.english'), ['class' => 'item']) !!}
                    {!! link_to('language?locale=fr', trans('front/site.french'), ['class' => 'item']) !!}
                </div>
            </div>
        </div>
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
    {!! Html::script('bower_components/jquery_jeditable/jquery.jeditable.js') !!}
    {!! Html::script('bower_components/semantic/dist/semantic.js') !!}
    {!! Html::script('js/app.js') !!}
    @yield('scripts')
</body>
</html>