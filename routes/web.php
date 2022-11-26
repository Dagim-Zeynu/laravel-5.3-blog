<?php

Route::get('/test', function(){
    return App\User::find(1)->profile;
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/home', [
        'uses'=>'HomeController@index',
        'as'=>'home'
    ]);

    Route::get('/post/create', [
        'uses'=>'PostsController@create',
        'as'=> 'post.create'
    ]);

    
    Route::post('/post/store', [
        'uses'=>'PostsController@store',
        'as'=> 'post.store'
    ]);

    Route::get('/post/delete/{id}', [
        'uses'=>'PostsController@destroy',
        'as'=> 'post.delete'
    ]);

    Route::get('/posts', [
        'uses'=>'PostsController@index',
        'as'=>'posts'
    ]);

    Route::get('/posts/trashed', [
        'uses'=>'PostsController@trashed',
        'as'=>'posts.trashed'
    ]);
    Route::get('/post/kill/{id}', [
        'uses'=>'PostsController@kill',
        'as'=> 'post.kill'
    ]);
    Route::get('/post/restore/{id}', [
        'uses'=>'PostsController@restore',
        'as'=> 'post.restore'
    ]);
    Route::get('/post/edit/{id}', [
        'uses'=>'PostsController@edit',
        'as'=> 'post.edit'
    ]);
    Route::post('/post/update/{id}', [
        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);
    Route::get('/catagory.create', [
        'uses'=>'CatagoriesController@create',
        'as'=>'catagory.create'
    ]);
    Route::get('/catagories', [
        'uses'=>'CatagoriesController@index',
        'as'=>'catagories'
    ]);

    Route::post('/catagory.store', [
        'uses'=>'CatagoriesController@store',
        'as'=>'catagory.store'
    ]);
    Route::get('/catagory/edit/{id}', [
        'uses'=>'CatagoriesController@edit',
        'as'=>'catagory.edit'
    ]);
    Route::get('/catagory/delete/{id}', [
        'uses'=>'CatagoriesController@destroy',
        'as'=>'catagory.delete'
    ]);

    Route::post('/catagory/update/{id}', [
        'uses'=>'CatagoriesController@update',
        'as'=>'catagory.update'
    ]);

    Route::get('/tags', [
        'uses'=>'TagsController@index',
        'as'=>'tags'
    ]);
    Route::get('/tag/edit/{id}', [
        'uses'=>'TagsController@edit',
        'as'=>'tag.edit'
    ]);
    Route::get('/tag/create', [
        'uses'=>'TagsController@create',
        'as'=>'tag.create'
    ]);
    Route::post('/tag/store', [
        'uses'=>'TagsController@store',
        'as'=>'tag.store'
    ]);
    Route::post('/tag/update/{id}', [
        'uses'=>'TagsController@update',
        'as'=>'tag.update'
    ]);
    Route::get('/tag/delete/{id}', [
        'uses'=>'TagsController@destroy',
        'as'=>'tag.delete'
    ]);

    Route::get('/users', [
        'uses'=>'UsersController@index',
        'as'=>'users'
    ]);
    Route::get('/user/create', [
        'uses'=>'UsersController@create',
        'as'=>'user.create'
    ]);
    Route::post('/user/store', [
        'uses'=>'UsersController@store',
        'as'=>'user.store'
    ]);
    Route::get('/user/admin/{id}', [
        'uses'=>'UsersController@admin',
        'as'=>'user.admin'
    ])->middleware('admin');
    
    Route::get('/user/not-admin/{id}', [
        'uses'=>'UsersController@not_admin',
        'as'=>'user.not.admin'
    ]);
    Route::get('user/profile', [
        'uses' => 'ProfileController@index',
        'as' => 'user.profile'
    ]);
    Route::get('user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    Route::get('/user/profile/update', [
        'user' => 'ProfileController@update',
        'as' => 'user.profile.update'
    ]);
});

