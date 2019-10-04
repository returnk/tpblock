<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

/*Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

return [

];*/
// 前台路由
Route::rule('cate/:id','index/index/index','get');
Route::rule('/','index/index/index','get');
Route::rule('article-<id>','index/article/info','get');
Route::rule('register','index/index/register','get|post');
Route::rule('login','index/index/login','get|post');
Route::rule('logout','index/index/logout','post');
Route::rule('content','index/index/content','post');

// 后台路由
Route::group('admin', function () {
    Route::rule('/', 'admin/index/login', 'get|post');
    Route::rule('register', 'admin/index/register', 'get|post');
    Route::rule('home', 'admin/home/index', 'get');
    Route::rule('logout', 'admin/home/logout', 'post');
    // 栏目
    Route::rule('catelist', 'admin/cate/list', 'get');
    Route::rule('cateadd', 'admin/cate/add', 'get|post');
    Route::rule('cateedit/[:id]', 'admin/cate/edit', 'get|post');
    Route::rule('catesort', 'admin/cate/sort', 'post');
    Route::rule('catedel', 'admin/cate/del', 'post');
    // 文章
    Route::rule('artlist', 'admin/articles/list', 'get');
    Route::rule('artadd', 'admin/articles/add', 'get|post');
    Route::rule('arttop', 'admin/articles/top', 'post');
    Route::rule('artedit/[:id]', 'admin/articles/edit', 'get|post');
    Route::rule('artdel', 'admin/articles/del', 'post');
    // 用户表
    Route::rule('memlist', 'admin/member/list', 'get');
    Route::rule('memadd', 'admin/member/add', 'get|post');
    Route::rule('memedit/[:id]', 'admin/member/edit', 'get|post');
    Route::rule('memdel', 'admin/member/del', 'post');
    Route::rule('adminList', 'admin/admin/list', 'get');
    Route::rule('adminAdd', 'admin/admin/add', 'get|post');
    Route::rule('commentList', 'admin/comment/list', 'get');
    Route::rule('commentDel', 'admin/comment/del', 'post');
    // 设置
    Route::rule('set', 'admin/system/set', 'get');
    Route::rule('setAdd', 'admin/system/add', 'get|post');
    Route::rule('setDel','admin/system/del','post');
});
