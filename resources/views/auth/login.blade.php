@extends('front.layout')

@section('main')
    <div class="column sixteen wide">
        <div class="ui segment">
            @if (count($errors) > 0)
                <div class="ui primary inverted red segment">
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif

            {!! Form::open(['class' => 'ui form', 'method' => 'post']) !!}
                <div class=" field">
                    <div class="required field">
                        {!! Form::label('email', 'Email') !!}

                        <div class="ui icon input">
                            {!! Form::email('email', old('email'), ['placeholder' => 'Email']) !!}
                            <i class="user icon"></i>
                        </div>
                    </div>
                    <div class="required field">
                        {!! Form::label('password', 'Password') !!}

                        <div class="ui icon input">
                            {!! Form::password('password', ['placeholder' => 'Password', 'maxlength' => '20']) !!}
                            <i class="lock icon"></i>
                        </div>
                    </div>
                    <div class="required field">
                        <div class="ui checkbox">
                            {!! Form::label('remember', trans('front/site.keeplogin')) !!}
                            {!! Form::checkbox('remember') !!}
                        </div>
                    </div>
                </div>
                <div class="ui grid">
                    <div class="column center aligned">
                        <button type="submit"
                                class="ui submit button green labeled huge">
                            {{ trans('front/site.login') }}
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $('.ui.checkbox').checkbox();
    </script>
@stop