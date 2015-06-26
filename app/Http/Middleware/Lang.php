<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Lang
{
    /**
     * @param $request
     * @param callable $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Session::has('locale'))
        {
            Session::put('locale', Config::get('app.locale'));
        }

        app()->setLocale(Session::get('locale'));

        return $next($request);
    }
}
