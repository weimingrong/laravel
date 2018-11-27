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
    set $host_path "/data/www/learnLaravel/public";
        server_name localhost;
        charset utf-8;

    location ~ \.php$ {
        root $host_path;
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        include        fastcgi.conf;
    }

    location / {
        index index.html index.php;
        root $host_path;
    }
}
```
