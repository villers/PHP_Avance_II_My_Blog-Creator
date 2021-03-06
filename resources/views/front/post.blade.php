@extends('front.layout')

@section('main')
    <div class="column sixteen wide">
        <div class="ui segment">
            <h2 class="ui dividing header"><a href="#">{{$post->title}}</a></h2>

            <div class="ui grid">
                <div class="sixteen wide column">
                    <p>{{$post->summary}}</p>
                    <div class="meta">
                        <span>{{trans('front/site.created')}} {{ date('Y-m-d H:i:s', strtotime($post->created_at)) }}</span>
                        @include('partials.tags', ['taglist' => $post->tags])
                    </div>
                </div>
            </div>
            <div class="ui divider"></div>
            <div class="ui comments" id="commentary">
                <div class="comment"></div>
                @foreach($post->comments as $comment)
                <div class="comment">
                    <a class="avatar">
                        {!! Html::image('http://www.gravatar.com/avatar/'. md5(strtolower(trim($comment->user->email))) .'.jpg?size=200', $comment->user->name, array('class' => 'center')) !!}
                    </a>
                    <div class="content">
                        <a class="author" href="{{ route('blog.user.index', ['login' => $comment->user->name]) }}">{{ $comment->user->name }}</a>
                        <div class="metadata">
                            <div class="date">Created {{ date('Y-m-d H:i:s', strtotime($comment->created_at)) }}</div>
                        </div>
                        <div class="text">
                            {{ $comment->content }}
                        </div>
                    </div>
                    <div class="ui divider"></div>
                </div>
                @endforeach
            </div>
            @if(!Auth::check())
            <div class="ui negative message">
                <i class="close icon"></i>
                <div class="header">
                    {{ trans('front/site.mustbeconnectedforcomment') }}
                </div>
            </div>
            @endif
            {!! Form::open(array('url' => "comment/$post->id", 'class' => 'ui reply form', 'id' => 'createcomments')) !!}
                <div class="field">
                    <textarea name="content"></textarea>
                </div>
                <button type="submit" class="ui button teal submit labeled icon">
                    <i class="icon edit"></i> {{ trans('front/site.addcomment') }}
                </button>
            {!! Form::close() !!}
        </div>
    </div>
@stop