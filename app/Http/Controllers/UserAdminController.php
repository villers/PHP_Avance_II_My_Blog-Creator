<?php

namespace App\Http\Controllers;

use App\Blog;
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
    public function getIndex()
    {
        $user = $this->user;
        return view('back.index', compact('user'));
    }

    // create blog
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
    public function putBlog($login)
    {
        $path = explode('-', Input::get('id'));
        $blog = Blog::findOrFail($path[1]);
        $blog->$path[0] = Input::get('value');
        $blog->save();
        return $blog->$path[0];
    }

    // delete blog
    public function deleteBlog($login, $id)
    {
        return Blog::destroy($id);
    }

    // get Articles
    public function getPost($login, $id)
    {
        $posts = Post::findOrFail($id);
        return view('back.index', compact('posts'));
    }
}
