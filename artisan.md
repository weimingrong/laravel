
### artisan创建表文件
* `php artisan make:migration create_comments_table`
 ```angular2html
打开 database/migrations/xxx_create_comments_table.php
编辑 public function up()
       {
           Schema::create('comments',function(Blueprint $table){
               $table->engine = 'InnoDB';
               $table->increments('id');
               $table->integer('article_id');
               $table->integer('user_id');
               $table->string('content');
               $table->timestamps();
           });
       }
   
       /**
        * Reverse the migrations.
        *
        * @return void
        */
       public function down()
       {
           Schema::dropIfExists('comments');
       }
``` 
* 生成表 `php artisan migrate`
* 如果要新增表，在建好建表文件后，执行 `php artisan migrate:rollback` 会调用建表文件中的down方法，把数据库结构恢复到最初状态
---
###  批量填充测试数据
* 创建填充表数据的文件 `php artisan make:seed CommentsTableSeeder`
```angular2html
1) 打开：database/seeds/CommentsTableSeeder.php
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Comment::class)->times(30)->create(); // 表示创建30条数据。factory方法对应第三步
    }
}
2) 打开database\seeds\DatabaseSeeder.php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CommentsTableSeeder::class); // 会调用CommentsTableSeeder的run方法
　　} 
}
3) 打开database\factories\ModelFactory.php
$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    $user = DB::table('users')->select('id')->orderBy(DB::raw('RAND()'))->first();
    if(empty($user))
    {
        $user->id = 0;
    }

    $article = DB::table('articles')->select('id')->orderBy(DB::raw('RAND()'))->first();
    if(empty($article))
    {
        $article->id = 0;
    }

    return [
        'user_id'=>$user->id, // user表随机查询
        'article_id'=>$article->id, // 从article表u随机查询
        'content' => '内容:'.$faker->text, // faker用法自寻，或转到vendor\fzaninotto\faker\src\Faker\Generator.php，看文件开头的注释
    ];
});

4) 如何让faker填充中文 　
打开app\Providers\AppServiceProvider.phppublic function boot()
  {
      \Carbon\Carbon::setLocale('zh'); // 针对时间包，转化后为中文的时间

      //生成中文数据
      $this->app->singleton(FakerGenerator::class, function() {
          return FakerFactory::create('zh_CN');
      });
  }


```
---
### artisan 修改表结构
`php artisan make:migration add_author_filed_into_articles_table`


---
### tinker 批量生产测试数据
`php artisan make:factory PostFactory -m Post`

`php artisan tinker`
`namespace App;`
`factory(User::class, 500)->create()`