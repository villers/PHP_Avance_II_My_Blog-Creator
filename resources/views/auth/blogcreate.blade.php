@extends('front.layout')
<!--
 // https://github.com/AaronJan/laravel5-example/blob/master/resources/views/welcome.blade.php

 -->
@section('main')
<div class="column sixteen wide">
  <div class="ui segment">
    <h2 class="ui header">Creation d'un blog</h2>
    {!! Form::open(array('url' => '/auth/blog/')) !!}

      <div class="ui form">
        <div class="field">
          <label>Titre</label>
          <input type="text" name='title'>
        </div>
      </div>

    </br>

      <div class="ui form">
        <div class="field">
          <label>Summary</label>
          <textarea name='summary'></textarea>
        </div>
      </div>

    </br>

      <input class="ui primary button" type="submit">
      <input class="ui button" type="reset">

    {!! Form::close() !!}
  </div>
</div>
@stop
