### composer搭建laravel
* `composer create-project laravel/laravel --prefer-dist projectname`

---
### 环境
* **`centos + nginx + mysql + php`**
* **`php7.1`**
* **`mysql5.5.3`**
* **`redis扩展`**

---
### nginx配置
```angular2html

server {
    listen       8601;
    server_name  localhost;

    set $php_cgi '127.0.0.1:9000';
    set $www_root '/data/www/learnLaravel/public';

    root $www_root;

    location ~ \.php$ {
        fastcgi_pass   $php_cgi;
        fastcgi_index  index.php;
        include        fastcgi.conf;
    }

    location / {
        index index.html index.php;
        try_files $uri $uri/ /index.php?$query_string;
    }
}

```
---
### 其他
* **改变文件夹及子目录下所有文件（夹）权限` chmod -R 777 learnLaravel/`**
* **要注意php版本和cli版本是否一致**
