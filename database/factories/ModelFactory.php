<?php
/**
 * Created by PhpStorm.
 * User: mingrong
 * Date: 2018/11/27
 * Time: 11:33
 */
use Faker\Generator as Faker;
use \Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    //users article 要有数据 否则会报错
    $user = DB::table('users')->select('id')->orderBy(DB::raw('RAND()'))->first();
    if(empty($user)){
        $user->id = 0;
    }

    $article = DB::table('articles')->select('id')->orderBy(DB::raw('RAND()'))->first();
    if(empty($article)){
        $article->id = 0;
    }

    return [
        'user_id' => $user->id,  //user表随机查询
        'article_id' => $article->id,//从article表随机查询
        'content' => '内容' . $faker->text
    ];
});
