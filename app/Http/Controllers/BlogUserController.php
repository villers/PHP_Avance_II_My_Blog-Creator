<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Route;

class BlogUserController extends Controller
{
    public function __construct(){
        $this->user = User::where('name', Route::input('login'))->firstOrFail();
    }

    public function getIndex()
    {
        $user = $this->user;
        return view('front.bloguser', compact('user'));
    }
}