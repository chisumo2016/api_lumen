<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api/v1'], function($router)

{
    //End Point of the posts
    $router->group(['prefix' => 'posts'], function($router)

    {
             // post

        $router->get('/index', 'PostsController@index');

        $router->post('/add', 'PostsController@createPost');

        $router->get('view/{id}', 'PostsController@viewPost');

        $router->put('edit/{id}', 'PostsController@updatePost');

        $router->delete('delete/{id}', 'PostsController@deletePost');

    });


    //End Point of the Users

    $router->group(['prefix' => 'users', 'middleware'=>'cors'], function($router)

    {

           //Users
        $router->get('index', 'UsersController@index');

        $router->post('add', 'UsersController@add');

        $router->get('view/{id}', 'UsersController@view');

        $router->put('edit/{id}', 'UsersController@edit');

        $router->delete('delete/{id}', 'UsersController@delete');



    });

});



//  KEEP


//$router->group(['prefix' => 'api/v1'], function($router)
//
//{
//    //End Point of the posts
//    $router->group(['prefix' => 'posts', 'middleware' =>'auth'], function($router)
//
//    {
//
//        $router->group(['middleware' =>'auth'], function($router)
//        {
//
//            $router->post('/add', 'PostsController@createPost');
//
//            $router->get('view/{id}', 'PostsController@viewPost');
//
//            $router->put('edit/{id}', 'PostsController@updatePost');
//
//        });
//        // post
//
//        $router->get('/index', 'PostsController@index');
//
//        $router->delete('delete/{id}', 'PostsController@deletePost');
//
//    });
//
//
//    //End Point of the Users
//
//    $router->group(['prefix' => 'users'], function($router)
//
//    {
//
//        //Users
//        $router->get('index', 'UsersController@index');
//
//        $router->post('add', 'UsersController@add');
//
//        $router->get('view/{id}', 'UsersController@view');
//
//        $router->put('edit/{id}', 'UsersController@edit');
//
//        $router->delete('delete/{id}', 'UsersController@delete');
//
//
//
//    });
//
//});

