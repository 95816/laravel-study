一. Laravel 路由
1.基本请求方式
①.Route::get('/',function(){
	return 'hello world';
})
②.Route::post('/',function(){
	return 'hello world';
})
③.Route::put('/',function(){
	return 'hello world';
})
④.Route::delete('/',function(){
	return 'hello world';
})
注:PUT、PATCH以及DELETE是Laravel中伪造的HTTP请求方式，需要在表单中添加<input type="hidden" name="_method" value="PUT（PATCH、DELETE）">才能生效

2.路由参数和参数限制
①.Route::get('/user/{id?}',function($id = null){
	
});
②.Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'this id is ' . $id . ',this name is ' . $name;
})->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);

3.路由分组(当都有共同前缀时或者控制器在同一个命名空间)
①.Route::group(['prefix' => 'user'], function () {
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

4.路由别名
①.Route::get('memeber/center', ['as' => 'center', function () {
    return route('center'); 可以返回URI
    return view('welcome'); 路由加载模板
}]);

5.路由控制器之间的联系
①.  Route::get('/memeber/info','MemberController@info');
	Route::get('/memeber/info', ['uses' => 'MemberController@info','as'='profile']);
