@extends('front.layout')
<!--
 // https://github.com/AaronJan/laravel5-example/blob/master/resources/views/welcome.blade.php

 -->
@section('main')
    <div class="column sixteen wide">
        <div class="ui segment">
            <h2 class="ui dividing header">{{$post->title}}</h2>

                <div class="ui grid">
                    <div class="sixteen wide column">
                        <h3 class="header">
                            <a href="#">{{$post->title}}</a>
                        </h3>
                        <p>{{$post->summary}}</p>
                        <div class="meta">
                            <span>Created {{ date('Y-m-d H:i:s', strtotime($post->created_at)) }}</span>
                            @foreach($post->tags as $index => $tags)
                                <a href="#">
                                    {{$tags->tag}}
                                    @if( $index+1 == count($tags))
                                        ,
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="ui divider"></div>
                </div>
            </div>
        </div>
    </div>
@stop