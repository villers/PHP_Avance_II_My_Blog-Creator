@extends('back.layout')

@section('main')
    <div class="column sixteen wide">
        <div class="ui segment">
            <h2 class="ui dividing header">Posts List</h2>

            <table class="ui compact celled definition table" id="formurl" data-action="{{ route('blog.user.admin.getPost', ['login' => $user->name, 'id' => $blog->id]) }}">
                <thead class="full-width">
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Content</th>
                        <th>Nb Comments</th>
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
                            <a href="{{ route('blog.user.admin.getPost', ['login' => $user->name, 'id' => $post->id]) }}" class="pull-right"><i class="zoom icon"></i>Open Post</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="full-width">
                    <tr>
                        <th></th>
                        <th colspan="4">
                            <div class="ui right floated small primary labeled icon button" id="add">
                                <i class="add circle icon"></i> Create Post
                            </div>
                            <div class="ui small  button red" id="delete">
                                Delete selected posts
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>

            <div class="ui modal" id="addblog">
                <i class="close icon"></i>
                <div class="header">
                    Modal Title
                </div>
                <div class="content">
                    <h2 class="ui header">Creation d'un post</h2>
                    {!! Form::open(array('url' => "/admin/$blog->id")) !!}

                    <div class="ui form">
                        <div class="field">
                            <label>Titre</label>
                            <input type="text" name='title' required>
                        </div>
                    </div>

                    <br>

                    <div class="ui form">
                        <div class="field">
                            <label>Summary</label>
                            <textarea name='summary' required></textarea>
                        </div>
                    </div>

                    <br>

                    <div class="ui form">
                        <div class="field">
                            <label>Content</label>
                            <textarea name='content' required></textarea>
                        </div>
                    </div>

                    <br>

                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                    <input class="ui primary button" type="submit">
                    <input class="ui button" type="reset">

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop