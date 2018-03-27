<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::put('/', function () {
    //return view('welcome');
    return ['1' => 'hello', '2' => 'world'];

});
Route::get('/user/{id}', function ($id) {
    return 'this is ' . $id . ' infos';
});
Route::get('/name/{name?}', function ($name = null) {
    if ($name == null) {
        return 'user lists';
    } else {
        return 'user of ' . $name;
    }
});

Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'this id is ' . $id . ',this name is ' . $name;
})->where(['id' => '[0-9]+', 'name' => '[a-zA-Z]+']);

Route::group(['prefix' => 'user'], function () {
    Route::get('{id}/comment/{name}', function ($id, $name) {
        return 'this id is ' . $id . ',this name is ' . $name;
    });
    Route::get('{id}', function ($id) {
        return 'this id is' . $id;
    })->where(['id' => '[0-9]+']);
    Route::get('{name?}', function ($name = 'lining') {
        return 'this name is ' . $name;
    })->where(['name' => '[a-zA-Z]+']);
});
Route::match(['get', 'post'], 'basic', function () {
    return 'Pi Pei';
});
Route::get('/memeber/center', ['as' => 'center', function () {
    return route('center');
}]);
Route::get('/newview', function () {
    return view('welcome');
});

//Route::get('/memeber/info','MemberController@info');
Route::get('/memeber/info', ['uses' => 'MemberController@info', 'as' => 'memberinfo']);

Route::get('/student/test', ['uses' => 'StudentController@test']);


Route::group(['prefix' => 'teacher', 'middleware' => ['web']], function () {
    Route::get('lists', ['uses' => 'Teachers\TeacherController@index', 'as' => 'teacher.lists']);
    Route::any('create', ['uses' => 'Teachers\TeacherController@create', 'as' => 'teacher.create']);
    Route::get('update/{id}', ['uses' => 'Teachers\TeacherController@update'])->where(['id'=>'[0-9]+']);
    Route::get('delete/{id}', ['uses' => 'Teachers\TeacherController@delete'])->where(['id'=>'[0-9]+']);
});