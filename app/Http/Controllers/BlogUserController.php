<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Route;

class BlogUserController extends Controller
{
    public function __construct(){
        $this->user = User::where('name', Route::input('login'))->firstOrFail();
    }

    public function getIndex($login)
    {
        $user = $this->user;
        return view('front.bloguser', compact('user'));
    }

    public function getBlog($login, $id)
    {
        $user = $this->user;
        $blog = Blog::findOrFail($id);
        return view('front.blog', compact('user', 'blog'));
    }

    public function getPost($login, $id)
    {
        $user = $this->user;
        $post = Post::findOrFail($id);
        return view('front.post', compact('user', 'post'));
    }
}