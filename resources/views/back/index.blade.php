@extends('front.layout')

@section('main')
    <div class="column sixteen wide">
        <div class="ui segment">
            <h2 class="ui dividing header">{{trans('front/site.bloglist')}}</h2>

            <table class="ui compact celled definition table" id="formurl" data-action="{{ route('blog.user.admin.index', ['login' => $user->name]) }}">
                <thead class="full-width">
                    <tr>
                        <th></th>
                        <th>{{ trans('front/site.title') }}</th>
                        <th>{{ trans('front/site.summary') }}</th>
                        <th>{{ trans('front/site.nbarticles') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->blogs as $blog)
                    <tr id="blog-{{$blog->id}}">
                        <td class="collapsing">
                            <div class="ui fitted slider checkbox">
                                <input type="checkbox" value="{{$blog->id}}"> <label></label>
                            </div>
                        </td>
                        <td class="edit" id="title-{{$blog->id}}">{{$blog->title}}</td>
                        <td class="edit_area" id="summary-{{$blog->id}}">{{$blog->summary}}</td>
                        <td>
                            {{count($blog->posts)}}
                            <a href="{{ route('blog.user.admin.getPost', ['login' => $user->name, 'id' => $blog->id]) }}" class="pull-right"><i class="zoom icon"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="full-width">
                    <tr>
                        <th></th>
                        <th colspan="4">
                            <div class="ui right floated small primary labeled icon button" id="add">
                                <i class="add circle icon"></i> {{ trans('front/site.createblog') }}
                            </div>
                            <div class="ui small  button red" id="delete">
                                {{ trans('front/site.deleteblog') }}
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>

            <div class="ui modal" id="addblog">
                <i class="close icon"></i>
                <div class="header">
                    {{ trans('front/site.createblog') }}
                </div>
                <div class="content">
                    {!! Form::open(array('url' => '/admin')) !!}

                    <div class="ui form">
                        <div class="field">
                            <label>{{ trans('front/site.title') }}</label>
                            <input type="text" name='title' required>
                        </div>
                    </div>

                    <br>

                    <div class="ui form">
                        <div class="field">
                            <label>{{ trans('front/site.summary') }}</label>
                            <textarea name='summary' required></textarea>
                        </div>
                    </div>

                    <br>

                    <input class="ui primary button" type="submit" value="{{ trans('front/site.valid') }}">
                    <input class="ui button" type="reset" value="{{ trans('front/site.reset') }}">

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop