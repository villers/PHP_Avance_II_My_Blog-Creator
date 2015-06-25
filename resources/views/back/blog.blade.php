@extends('front.layout')

@section('main')
    <div class="column sixteen wide">
        <div class="ui segment">
            <span class="pull-left">
                <a href="{{route('blog.user.admin.index', ['login' => $user->name])}}">Blogs</a>
                &gt;Posts
            </span>

            <h2 class="ui dividing header">{{ trans('front/site.postlist') }}</h2>

            <table class="ui compact celled definition table" id="formurl" data-action="{{ route('blog.user.admin.getPost', ['login' => $user->name, 'id' => $blog->id]) }}">
                <thead class="full-width">
                    <tr>
                        <th></th>
                        <th>{{ trans('front/site.title') }}</th>
                        <th>{{ trans('front/site.summary') }}</th>
                        <th>{{ trans('front/site.content') }}</th>
                        <th>{{ trans('front/site.nbcomments') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blog->posts as $post)
                    <tr id="blog-{{$post->id}}">
                        <td class="collapsing">
                            <div class="ui fitted slider checkbox">
                                <input type="checkbox" value="{{$post->id}}"> <label></label>
                            </div>
                        </td>
                        <td class="edit" id="title-{{$post->id}}">{{$post->title}}</td>
                        <td class="edit_area" id="summary-{{$post->id}}">{{$post->summary}}</td>
                        <td class="edit_area" id="content-{{$post->id}}">{{$post->content}}</td>
                        <td>
                            {{count($post->comments)}}
                            <a href="{{ route('blog.user.admin.getComment', ['login' => $user->name, 'id' => $blog->id, 'postId' => $post->id]) }}" class="pull-right"><i class="zoom icon"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="full-width">
                    <tr>
                        <th></th>
                        <th colspan="4">
                            <div class="ui right floated small primary labeled icon button" id="add">
                                <i class="add circle icon"></i> {{ trans('front/site.createpost') }}
                            </div>
                            <div class="ui small  button red" id="delete">
                                {{ trans('front/site.deletepost') }}
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>

            <div class="ui modal" id="addblog">
                <i class="close icon"></i>
                <div class="header">
                    {{ trans('front/site.createpost') }}
                </div>
                <div class="content">
                    {!! Form::open(array('url' => "/admin/$blog->id")) !!}

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

                    <div class="ui form">
                        <div class="field">
                            <label>{{ trans('front/site.content') }}</label>
                            <textarea name='content' required></textarea>
                        </div>
                    </div>

                    <br>

                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                    <input class="ui primary button" type="submit" value="{{ trans('front/site.valid') }}">
                    <input class="ui button" type="reset" value="{{ trans('front/site.reset') }}">

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop