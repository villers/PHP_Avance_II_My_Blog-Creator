@extends('front.layout')
<!--
 // https://github.com/AaronJan/laravel5-example/blob/master/resources/views/welcome.blade.php

 -->
@section('main')
    <div class="column sixteen wide">
        <div class="ui segment">
            <h2 class="ui dividing header">Message board</h2>

            <div class="ui feed">
                <div class="event">
                    <div class="label">
                        <img src="http://videonoob.fr/wp-content/uploads/001.jpg">
                    </div>
                    <div class="content">
                        <div class="summary">
                            <span class="ui blue label">Name</span>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, dignissimos quis! A cumque dolor ea eaque est, eum, expedita harum iure maxime nostrum praesentium quam ratione repellat sapiente tenetur. Quia!
                            <div class="date">
                                Message
                            </div>
                        </div>
                        <div class="meta">
                            <a class="like">
                                <i class="like icon"></i> Like
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination start -->
            <div class="ui pagination menu">
                <a class="icon item">
                    <i class="left arrow icon"></i>
                </a>
                <a class="active item">
                    1
                </a>
                <div class="disabled item">
                    ...
                </div>
                <a class="item">
                    10
                </a>
                <a class="item">
                    11
                </a>
                <a class="item">
                    12
                </a>
                <a class="icon item">
                    <i class="right arrow icon"></i>
                </a>
                {! with(new App\Presenter\SemanticUiPresenter($messages))->render() !}
            </div>
            <!-- Pagination end -->

            <div class="ui divider"></div>


            <div class="ui info message">
                <p>
                    Login to leave a message!
                </p>
            </div>

            <div class="ui divider"></div>

            <form action="/message/store" method="post" class="ui form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="field">
                    <label>Message</label>
                    <textarea name="content"></textarea>
                </div>

                <button type="submit" class="ui submit button green fluid">publish</button>
            </form>

        </div>
    </div>
@stop