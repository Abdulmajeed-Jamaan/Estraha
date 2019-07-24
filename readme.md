<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Setup

- Clone your project
- Go to the folder application using cd command on your cmd or terminal
- Run composer install on your cmd or terminal
- Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
- Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration. 
By default, the username is root and you can leave the password field empty. (This is for Xampp) 
By default, the username is root and password is also root. (This is for Lamp)
- Run php artisan key:generate
- Run php artisan migrate
- Run php artisan storage:link
- Run php artisan serve

Resource https://stackoverflow.com/questions/38602321/cloning-laravel-project-from-github






# Seeder

- Go to the folder application using cd command on your cmd or terminal
- Run composer dump-autoload
- Run php artisan db:seed --class=DatabaseSeeder

!! Pay attention Do Not Delete Any data why ? >> for Relations Problems

Resource https://stackoverflow.com/questions/26143315/laravel-5-artisan-seed-reflectionexception-class-songstableseeder-does-not-e







## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
