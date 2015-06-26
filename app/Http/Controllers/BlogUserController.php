<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use App\Follow;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class BlogUserController extends Controller
{
    public function __construct(){
        $this->user = User::where('name', Route::input('login'))->firstOrFail();
    }

    public function getIndex($login)
    {
        $user = $this->user;
        if(Auth::check() && Follow::where('user_id', Auth::user()->id)->where('user_followed_id', $this->user->id)->first())
            $checkFollow = true;
        else
            $checkFollow = false;

        return view('front.bloguser', compact('user', 'checkFollow'));
    }

    public function getBlog($login, $id)
    {
        $user = $this->user;
        $blog = Blog::findOrFail($id);
        return view('front.blog', compact('user', 'blog'));
    }

    public function getTag($login, $name)
    {
        $user = $this->user;
        $tag = Tag::where('tag', $name)->get()[0];
        return view('front.tag', compact('user', 'tag'));
    }

    public function getPost($login, $id)
    {
        $user = $this->user;
        $post = Post::findOrFail($id);
        return view('front.post', compact('user', 'post'));
    }

    public function postComment($login, $id)
    {
        $comment = new Comment;
        $comment->content = Input::get('content');
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->seen = false;
        $comment->save();

        $html = '<div class="comment">
                    <a class="avatar">'.
                        \Illuminate\Html\HtmlFacade::image('http://www.gravatar.com/avatar/'. md5(strtolower(trim(Auth::user()->email))) .'.jpg?size=200', Auth::user()->name, array('class' => 'center')).'
                    </a>
                    <div class="content">
                        <a class="author">'.Auth::user()->name.'</a>
                        <div class="metadata">
                            <div class="date">Created  '.date('Y-m-d H:i:s').'</div>
                        </div>
                        <div class="text">
                            '.htmlspecialchars($comment->content).'
                        </div>
                    </div>
                    <div class="ui divider"></div>
                </div>';
        return $html;
    }
}