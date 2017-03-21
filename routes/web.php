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

//基础路由
Route::get('/', function () {
    return view('welcome');
});
Route::post('basic2',function(){
    return 'Baics2';
});

Route::get('basic1',function(){
        return  'helle world!';
});

//多请求路由
Route::match(['get','post'],'multy1',function(){
   return 'multy1';
});

Route::any('multy2',function(){
    return 'multy2';
});

//路由参数

//Route::get('user/{id}',function($id){
//   return 'User-'.$id;
//});

//Route::get('user/{name?}',function($name=null){
//   return 'User-name'.$name;
//});

//
//Route::get('user/{name?}',function($name='zhured'){
//    return 'User-name '.$name;
//});

//
//Route::get('user/{name?}',function($name='zhured'){
//    return 'User-name '.$name;
//})->where(['name'=>'[A-Za-z]+']);


//路由别名

Route::get('user/member-center',['as'=>'center',function(){
    return 'aaaaaaa';
}]);