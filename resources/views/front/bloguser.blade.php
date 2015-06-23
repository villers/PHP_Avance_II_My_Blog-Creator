@extends('front.layout')
<!--
 // https://github.com/AaronJan/laravel5-example/blob/master/resources/views/welcome.blade.php

 -->
@section('main')
    <div class="column sixteen wide">
        <div class="ui segment">
            <h2 class="ui dividing header">Blog's of {{$user->name}}</h2>

            <div class="ui grid">
                @foreach($user->blogs as $blog)
                    <div class="four wide column">
                        <div class="ui card">
                            <div class="content">
                                <div class="header">
                                    <a href="{{ route('blog.user.blog', ['login' => $user->name, 'id' => $blog->id]) }}">{{$blog->title}}</a>
                                </div>
                                <div class="meta">
                                    <span>Created {{ date('Y', strtotime($blog->created_at)) }}</span>
                                </div>
                                <p>{{$blog->summary}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop