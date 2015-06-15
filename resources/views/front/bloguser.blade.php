@extends('front.layout')
<!--
 // https://github.com/AaronJan/laravel5-example/blob/master/resources/views/welcome.blade.php

 -->
@section('main')
    <div class="column sixteen wide">
        <div class="ui segment">
            <h2 class="ui dividing header">Blog's of {{$user->name}}</h2>

            <div class="ui grid">
                @foreach($user->posts as $post)
                    <div class="four wide column">
                        <div class="ui card">
                            <div class="content">
                                <div class="header">
                                    <a href="#">{{$post->title}}</a>
                                </div>
                                <div class="meta">
                                    <span>Created {{ date('Y', strtotime($user->created_at)) }}</span>
                                    @foreach($post->tags as $index => $tags)
                                        <a href="#">
                                            {{$tags->tag}}
                                            @if( $index+1 == count($tags))
                                                ,
                                            @endif
                                        </a>
                                    @endforeach
                                </div>
                                <p>{{$post->summary}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop