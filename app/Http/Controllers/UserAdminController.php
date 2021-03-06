<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class UserAdminController extends Controller
{
    public function __construct(){
        $this->user = User::where('name', Route::input('login'))->firstOrFail();
    }

    // list blog
    /**
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $user = $this->user;
        return view('back.index', compact('user'));
    }

    // create blog
    /**
     * @param $login
     * @return mixed
     */
    public function postBlog($login)
    {
        $blog = new Blog;
        $blog->title =   Input::get('title');
        $blog->summary = Input::get('summary');
        $blog->user_id = Auth::user()->id;
        $blog->save();
        return Redirect::route('blog.user.admin.index', Auth::user()->name);
    }

    // edit blog
    /**
     * @param $login
     * @return string
     */
    public function putBlog($login)
    {
        $path = explode('-', Input::get('id'));
        $blog = Blog::findOrFail($path[1]);
        $blog->$path[0] = Input::get('value');
        $blog->save();
        return htmlspecialchars($blog->$path[0]);
    }

    // delete blog
    /**
     * @param $login
     * @param $id
     * @return int
     */
    public function deleteBlog($login, $id)
    {
        return Blog::destroy($id);
    }

    // get Articles
    /**
     * @param $login
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getPost($login, $id)
    {
        $user = $this->user;
        $blog = Blog::findOrFail($id);
        return view('back.blog', compact('user', 'blog'));
    }

    // edit blog
    /**
     * @param $login
     * @param $id
     * @return string
     */
    public function putPost($login, $id)
    {
        $path = explode('-', Input::get('id'));
        $post = Post::findOrFail($path[1]);
        $post->$path[0] = Input::get('value');
        if($path[0] == 'title')
            $post->slug = str_slug(Input::get('value'));
        $post->save();
        return htmlspecialchars($post->$path[0]);
    }

    // create post
    /**
     * @param $login
     * @param $id
     * @return mixed
     */
    public function postPost($login, $id)
    {
        $post = new Post;
        $post->title =   Input::get('title');
        $post->slug = str_slug(Input::get('title'));
        $post->summary = Input::get('summary');
        $post->content = Input::get('content');
        $post->blog_id = $id;
        $post->user_id = Auth::user()->id;
        $post->save();
        return Redirect::route('blog.user.admin.getPost', ['login' => Auth::user()->name, 'id' => $id]);
    }

    // delete blog
    /**
     * @param $login
     * @param $id
     * @param $postId
     * @return int
     */
    public function deletePost($login, $id, $postId)
    {
        return Post::destroy($postId);
    }

    // get Comments
    /**
     * @param $login
     * @param $id
     * @param $postId
     * @return \Illuminate\View\View
     */
    public function getComment($login, $id, $postId)
    {
        $user = $this->user;
        $comments = Comment::where('post_id', $postId)->get();
        return view('back.comment', compact('user', 'id', 'postId', 'comments'));
    }

    // delete Comment
    /**
     * @param $login
     * @param $id
     * @param $postId
     * @param $commentId
     * @return int
     */
    public function deleteComment($login, $id, $postId, $commentId)
    {
        return Comment::destroy($commentId);
    }
}
