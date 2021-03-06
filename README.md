
![Harmony Role Base Authentication](https://i.ibb.co/0YCJCYK/github-banner.png "Harmony Role Base Authentication")
# Harmony Role Base Authentication

## Pre-requirements
- PHP7 or higher
- Composer
- NodeJS
- Gupl CLI (Recomended)
- MySQL

## Install

Step 1 : 
```bash
$ git clone <url>
$ cd project
```

Step 2 :
copy .env.example to .env

Step 3 :
define your database name & password

Step 4 :
```bash
$ composer install
$ npm install
```

Step 5 :
Open File `app/Database/migrations/xxxxxxx_Admins` edit role you prefer :

```php
$table->enum('role', [
    'super_admin', 
    'writer', 
    'marketing', 
]);
```

Step 6 :
```bash
$ php artisan db:migrate
$ gulp
```

