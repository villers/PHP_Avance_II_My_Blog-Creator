@extends('front.layout')

@section('main')
    <div class="column sixteen wide">
        <div class="ui segment">
            <h2 class="ui dividing header">{{ trans('front/site.userslist') }}</h2>

            <div class="ui grid">
                @foreach($users as $user)
                <div class="four wide column">
                    <div class="ui card">
                        <div class="image dimmable">
                            <div class="ui dimmer">
                                <div class="content">
                                    <div class="center">
                                        <a class="ui inverted button" href="{{ route('blog.user.index', ['login' => $user->name]) }}">{{ trans('front/site.showuser') }}</a>
                                    </div>
                                </div>
                            </div>
                            {!! Html::image('http://fr.gravatar.com/avatar/'. md5(strtolower(trim($user->email))) .'?size=300', $user->name, array('class' => 'center')) !!}
                        </div>
                        <div class="content">
                            <div class="header">{{$user->name}}</div>
                            <div class="meta">
                                <a class="group">{{$user->role->title}}</a>
                            </div>
                        </div>
                        <div class="extra content">
                            <a class="right floated created">
                                {{ trans('front/site.joined') }} {{ date('Y', strtotime($user->created_at)) }}
                            </a>
                            <a class="friends">
                                <i class="user icon"></i>
                                {{ count($user->followers) }} {{ trans('front/site.followers') }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="ui divider"></div>

            <div class="ui column center aligned">
                {!! with(new App\Presenter\SemanticUiPresenter($users))->render() !!}
            </div>
        </div>
    </div>
@stop