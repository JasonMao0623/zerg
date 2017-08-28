<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//定义banner路由
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');
//定义主题路由
Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
//定义主题详细信息路由
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');
//定义获取新品路由
Route::get('api/:version/product/recent','api/:version.Product/getRecent');
//定义回去所有类别路由
Route::get('api/:version/category/all','api/:version.Category/getAllCategorise');
//定义通过类别获取商品路由
Route::get('api/:version/product/by_category','api/:version.product/getCategoryProducts');
//定义获取token接口
Route::post('api/:version/token/user','api/:version.Token/getToken');