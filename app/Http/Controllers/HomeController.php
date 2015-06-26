<?php
/**
 * Created by PhpStorm.
 * User: viller_m
 * Date: 14/06/15
 * Time: 17:12
 */

namespace app\Http\Controllers;
use App\Follow;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller {
    public function getIndex() {
        $users = User::paginate(8);
        return view('front.index', compact('users'));
    }

    public function getHome() {
        return redirect('/');
    }

    public function getSearch() {
        $search = Input::get('search');
        $posts = Post::where('title', 'like', '%'.$search.'%')
            ->orWhere('summary', 'like', '%'.$search.'%')
            ->orWhere('content', 'like', '%'.$search.'%')->get();
        return view('front.search', compact('posts', 'search'));
    }

    public function getFollow($id)
    {
        $queryFollow = Follow::where('user_id', Auth::user()->id)->where('user_followed_id', $id);

        if ($queryFollow->first()) {
            $queryFollow->delete();
        } else {
            Follow::create(['user_id' => Auth::user()->id, 'user_followed_id' => $id]);
        }
        return redirect()->back();
    }
}