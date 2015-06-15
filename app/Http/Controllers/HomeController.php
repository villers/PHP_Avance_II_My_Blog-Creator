<?php
/**
 * Created by PhpStorm.
 * User: viller_m
 * Date: 14/06/15
 * Time: 17:12
 */

namespace app\Http\Controllers;
use App\User;

class HomeController extends Controller {
    public function getIndex() {
        $users = User::paginate(5);
        return view('front.index', compact('users'));
    }

    public function getHome() {
        return redirect('/');
    }
}