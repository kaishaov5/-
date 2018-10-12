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

// Route::get('/', function () {
//     return view('welcome');
// });

//前台首页
Route::get('/', 'IndexController@index');

//个人中心
Route::get('/personal/{id}', 'PersonalController@index');
    //修改密码
    Route::get('/personal/password/{id}', 'PersonalController@password');
    Route::post('/personal/updatePassword', 'PersonalController@updatePassword');
    //验证旧密码
    Route::post('/personal/changePassword', 'PersonalController@changePassword');

//分类页
Route::get('/cate/{id}.html', 'CateController@index');
//详情页
Route::get('/article/{id}.html', 'ArticleController@index');

//用户发布模块
Route::get('/publish/article', 'PublishController@article');
Route::post('publish/storeArticle', 'PublishController@storeArticle');
Route::get('/publish/article/edit/{id}', 'PublishController@editArticle');
Route::post('/publish/updateArticle', 'PublishController@updateArticle');
Route::get('/publish/delArticle/{id}', 'PublishController@delArticle');

//评论文章
Route::post('/commentArticle/uploadpic', 'CommentArticleController@uploadpic');
Route::post('/commentArticle/store', 'CommentArticleController@store');

//论坛模块
    //进入论坛首页
    Route::get('/bbs', 'BbsController@index');
    //查看顶级分类版块
    Route::get('/bbs/fucate/{id}.html', 'BbsController@fucate');
    //查看二级分类板块
    Route::get('/bbs/zicate/{id}.html', 'BbsController@zicate');
    //查看单个帖子
    Route::get('/bbs/post/{id}.html', 'BbsController@post');

    //用户发布帖子
    Route::get('/publish/post', 'PublishController@post');
    Route::post('/publish/storePost', 'PublishController@storePost');
    Route::post('/publish/uploadpic', 'PublishController@uploadPic');
    //用户回复帖子
    Route::get('/publish/reply/{id}', 'PublishController@reply');
    Route::post('/publish/storeReply', 'PublishController@storeReply');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//搜索路由
 //搜索框智能下拉联想
 Route::post('/search/input','SearchController@search');

 //点击搜索后跳转到的页面
 Route::get('/search','SearchController@index');


//后台路由
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/', 'Admin\IndexController@index');

        Route::get('/clearCache', 'Admin\IndexController@clearCache');

        //后台用户管理模块
        Route::get('adminuser', 'Admin\AdminUserController@index');
        Route::get('adminuser/add', 'Admin\AdminUserController@add');
        Route::post('adminuser/store', 'Admin\AdminUserController@store');

        //前台用户管理模块
        Route::get('homeuser', 'Admin\HomeUserController@index');
        Route::get('homeuser/add', 'Admin\HomeUserController@add');
        Route::post('homeuser/store', 'Admin\HomeUserController@store');

            //查看前台用户发布的文章
            Route::get('homeuser/article/{id}', 'Admin\HomeUserController@article');

            //查看前台用户发布的帖子
            Route::get('homeuser/post/{id}', 'Admin\HomeUserController@post');

        //分类模块
        Route::get('cate', 'Admin\CateController@index');
        Route::get('cate/add', 'Admin\CateController@add');
        Route::post('cate/store', 'Admin\CateController@store');
        Route::get('cate/edit', 'Admin\CateController@edit');
        Route::post('cate/update', 'Admin\CateController@update');
        Route::get('cate/chaxun', 'Admin\CateController@chaxun');
        Route::get('cate/delete', 'Admin\CateController@delete');
        Route::get('cate/articles/{id}', 'Admin\CateController@articles');

        //文章模块
        Route::get('article', 'Admin\ArticleController@index');
        // Route::get('article/add', 'Admin\ArticleController@add');
        // Route::post('article/store', 'Admin\ArticleController@store');
        Route::get('article/edit/{id}', 'Admin\ArticleController@edit');
        Route::post('article/updateTitle', 'Admin\ArticleController@updateTitle');
        Route::get('article/editDetail/{id}', 'Admin\ArticleController@editDetail');
        Route::post('article/updateDetail', 'Admin\ArticleController@updateDetail');
        Route::get('article/delete/{id}', 'Admin\ArticleController@delete');
        Route::get('article/comments/{id}', 'Admin\ArticleController@comments');
        Route::get('article/comments/detail/{id}', 'Admin\ArticleController@commentDetail');
        Route::post('article/comments/updateCommentDetail', 'Admin\ArticleController@updateCommentDetail');
        Route::get('article/comments/commentDelete/{id}', 'Admin\ArticleController@commentDelete');

        //友情链接模块
        Route::get('link', 'Admin\LinkController@index');
        Route::get('link/add', 'Admin\LinkController@add');
        Route::post('link/store', 'Admin\LinkController@store');
        Route::get('link/edit/{id}', 'Admin\LinkController@edit');
        Route::post('link/update', 'Admin\LinkController@update');
        Route::get('link/delete/{id}', 'Admin\LinkController@delete');

        //网站配置管理
        Route::get('config', 'Admin\ConfigController@index');
        Route::post('config/store', 'Admin\ConfigController@store');

        //后台论坛管理模块
            //分类模块
            Route::get('bbs/cate', 'Admin\BbsCateController@index');
            Route::get('bbs/cate/create', 'Admin\BbsCateController@create');
            Route::post('bbs/cate/store', 'Admin\BbsCateController@store');
            Route::get('bbs/cate/edit', 'Admin\BbsCateController@edit');
            Route::post('bbs/cate/update', 'Admin\BbsCateController@update');
            Route::get('bbs/cate/chaxun', 'Admin\BbsCateController@chaxun');
            Route::get('bbs/cate/delete', 'Admin\BbsCateController@delete');
            Route::get('bbs/cate/post/{id}', 'Admin\BbsCateController@posts');

            //帖子模块
            Route::get('bbs/post', 'Admin\PostController@index');
            Route::get('bbs/post/detail/{id}', 'Admin\PostController@detail');
            Route::post('bbs/post/updateDetail', 'Admin\PostController@updateDetail');
            Route::get('bbs/post/edit/{id}', 'Admin\PostController@edit');
            Route::post('bbs/post/update', 'Admin\PostController@update');
            Route::get('bbs/post/delete/{id}', 'Admin\PostController@delete');
            //查看回帖
            Route::get('bbs/post/reply/{id}', 'Admin\PostController@reply');
            Route::get('bbs/post/reply/detail/{id}', 'Admin\PostController@replyDetail');
            Route::post('bbs/post/reply/updateDetail', 'Admin\PostController@updateReplyDetail');
            Route::get('bbs/post/reply/delete/{id}', 'Admin\PostController@replyDelete');
    });

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
    Route::post('logout', 'Admin\LoginController@logout');
    Route::post('article/uploadpic', 'Admin\ArticleController@uploadpic');

});
