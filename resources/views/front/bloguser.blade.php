@extends('front.layout')

@section('main')
    <div class="column sixteen wide">
        <div class="ui segment">

            @if(Auth::check() && $user->id !== Auth::user()->id)
                <a href="{{ route('blog.follow', ['id' => $user->id]) }}" class="ui basic button">
                    @if(!$checkFollow)
                        <i class="icon add square"></i>
                        {{ trans('front/site.follow') }}
                    @else
                        <i class="icon remove user"></i>
                        {{ trans('front/site.unfollow') }}
                    @endif
                </a>
            @endif


            <h2 class="ui dividing header">
                {{trans('front/site.blogof')}} {{$user->name}}
            </h2>

            <div class="ui grid">
                @foreach($user->blogs as $blog)
                    <div class="four wide column item-blog">
                        <div class="ui card">
                            <div class="content">
                                <div class="header">
                                    <a href="{{ route('blog.user.blog', ['login' => $user->name, 'id' => $blog->id]) }}">{{$blog->title}}</a>
                                </div>
                                <div class="meta">
                                    <span>{{trans('front/site.created')}} {{ date('Y', strtotime($blog->created_at)) }}</span>
                                </div>
                                <p>{{ str_limit($blog->summary, 50, $end = '...') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
