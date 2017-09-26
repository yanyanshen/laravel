<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//基础路由
Route::get('index1',function(){
   return 'Hello Word1';
});
Route::post('index2',function(){
    return 'Hello Word2';
});
//多请求路由
Route::match(['get','post'],'multy1',function(){
    return 'multy1';
});
Route::any('multy2',function(){
    return 'multy2';
});
//路由参数
Route::get('user/{id}',function($id){
    return 'User-'.$id;
});
//Route::get('user/{name?}',function($name=null){
//    return 'User-name'.$name;
//});

Route::get('user/{name?}',function($name='admim'){
    return 'User-name: '.$name;
});
Route::get('user/{name?}',function($name='admim'){
    return 'User-name: '.$name;
});
//正则匹配
Route::get('user1/{name?}',function($name='admin'){
    return 'User1-name: '.$name;
})->where('name','[A-Za-z]+');

//多参数正则匹配
//route::get('user2/{id}/{name?}',function($id,$name='ha'){
//    return 'User2-id:'.$id.'; name: '.$name;
//})->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);

//路由别名
//Route::get('User3/member-center',['as'=>'center',function(){
//    return route('center');
//}]);

//路由群组
Route::group(['prefix'=>'member'],function(){
    Route::get('group1/member-center',['as'=>'center',function(){
        return route('center');
    }]);
    Route::get('group2/{name?}',function($name='admim'){
        return 'group2: '.$name;
    });
});
//路由中输出视图
Route::get('view',function(){
 return view('welcome');
});


//MemberController.php 与路由关联
//第一种
//Route::get('member/info','MemberController@info');
//第二种
//Route::get('member/info',['uses'=>'MemberController@info']);
//Route::post('member/info',['uses'=>'MemberController@info']);
//Route::any('member/info',['uses'=>'MemberController@info']);
//Route::match(['get','post'],'member/{id?}',[
//    'uses'=>'MemberController@info',
//    'as'=>'wuwu'
//]);
//参数绑定
//Route::get('member/{id}',[
//    'uses'=>'MemberController@info',
//    'as'=>'member'
//])->where('id','[0-9]+');


//视图输出的方法 路由绑定
Route::get('member/member_info',['uses'=>'MemberController@member_info']);
//post guanlilian

//默认模板输出
Route::get('member/defaultTemplate',['uses'=>'MemberController@defaultTemplate']);


//StudentController 与路由关联
Route::get('student/student1',['uses'=>'StudentController@student1']);
Route::get('student/student2',['uses'=>'StudentController@student2']);
Route::get('student/student3',['uses'=>'StudentController@student3']);
Route::get('student/student4',['uses'=>'StudentController@student4']);
Route::get('student/student5',['uses'=>'StudentController@student5']);
Route::get('student/orm1',['uses'=>'StudentController@orm1']);
Route::get('student/orm2',['uses'=>'StudentController@orm2']);
Route::get('student/orm3',['uses'=>'StudentController@orm3']);
Route::get('student/orm4',['uses'=>'StudentController@orm4']);
Route::get('section1',['uses'=>'StudentController@section1']);
Route::get('urlTest',['uses'=>'StudentController@urlTest','as' => 'url']);
Route::get('request1',['uses'=>'StudentController@request1']);
Route::any('upload',['uses'=>'StudentController@upload']);
Route::any('mail',['uses'=>'StudentController@mail']);
Route::any('cache1',['uses'=>'StudentController@cache1']);
Route::any('cache2',['uses'=>'StudentController@cache2']);
Route::any('error',['uses'=>'StudentController@error']);
Route::any('queue',['uses'=>'StudentController@queue']);


//宣传页面
Route::get('activity0',['uses'=>'StudentController@activity0']);
//活动页面
Route::group(['middleware' => ['activity']],function(){
    Route::get('activity1',['uses'=>'StudentController@activity1']);
    Route::get('activity2',['uses'=>'StudentController@activity2']);
});

Route::group(['middleware' => ['web']],function(){
    Route::any('session1',['uses'=>'StudentController@session1']);
    Route::any('session2',['uses'=>'StudentController@session2','as' => 'ses']);
    Route::get('response',['uses'=>'StudentController@response']);
//表单提交
    Route::get('student/index',['uses' => 'StudentController@index']);
    Route::any('student/create',['as' => 'create','uses' => 'StudentController@create']);
    Route::any('student/save',['as' => 'create','uses' => 'StudentController@save']);
    Route::any('student/update/{id}',['uses' => 'StudentController@update']);
    Route::any('student/detail/{id}',['uses' => 'StudentController@detail']);
    Route::any('student/delete/{id}',['uses' => 'StudentController@delete']);
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

//用户Auth认证
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
