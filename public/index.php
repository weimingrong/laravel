<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/
//使用composer 的自动加载功能，把所有需要使用的PHP文件添加到系统中以备调用
require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';  //获取laravel应用实例
//laravel的第一个动作是 创建服务容器实例
/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

/**
 * 接受请求，对请求进行处理，返回请求处理的结果
 */
//请求被发送到HTTP内核或console内核（分别用于处理web请求和artisan命令，取决于进入应用的请求类型）
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
//交给路由器 进行分发请求到路由或控制器，同时运行所有路由指定的中间件
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();
//请求结束，进行回调
$kernel->terminate($request, $response);
