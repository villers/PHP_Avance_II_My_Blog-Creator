@extends('back.layout')

@section('main')
    <div class="column sixteen wide">
        <div class="ui segment">
            <span class="pull-left">
                <a href="{{route('blog.user.admin.index', ['login' => $user->name])}}">Blogs</a>
                &gt;<a href="{{route('blog.user.admin.getPost', ['login' => $user->name,  'id' => $id])}}">Posts</a>
                &gt;Comments
            </span>
            <h2 class="ui dividing header">Comments List</h2>

            <table class="ui compact celled definition table" id="formurl" data-action="{{ route('blog.user.admin.getComment', ['login' => $user->name,  'id' => $id, 'postId' => $postId]) }}">
                <thead class="full-width">
                    <tr>
                        <th></th>
                        <th>Author</th>
                        <th>Content</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr id="blog-{{$comment->id}}">
                        <td class="collapsing">
                            <div class="ui fitted slider checkbox">
                                <input type="checkbox" value="{{$comment->id}}"> <label></label>
                            </div>
                        </td>
                        <td id="author-{{$comment->id}}">{{$comment->user->name}}</td>
                        <td id="content-{{$comment->id}}">{{$comment->content}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="full-width">
                    <tr>
                        <th></th>
                        <th colspan="4">
                            <div class="ui small  button red" id="delete">
                                Delete selected posts
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@stop