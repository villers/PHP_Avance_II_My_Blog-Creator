<?php
/**
 * Created by PhpStorm.
 * User: viller_m
 * Date: 14/06/15
 * Time: 17:12
 */

namespace app\Http\Controllers;
use App\Http\Controllers\Controller;

class HomeController extends Controller {
    public function getIndex() {
        return view('front.index');
    }

    public function getHome() {
        return redirect('/');
    }
}