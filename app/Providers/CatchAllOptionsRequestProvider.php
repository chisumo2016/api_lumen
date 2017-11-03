<?php
/**
 * Created by PhpStorm.
 * User: bundalla
 * Date: 11/3/2017
 * Time: 1:47 PM
 */

namespace App\Providers;


class CatchAllOptionsRequestProvider
{
    /**
     * If the incoming request is an OPTIONS request
     * we will register a handler for the requested route
     */
    public function register()
    {
        $request = app('request');
        if ($request->isMethod('OPTIONS')) {
            app()->options($request->path(), function () {
                return response('', 200);
            });
        }
    }
}