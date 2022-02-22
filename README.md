# Laravel Restfull API

Example Restfull api with laravel framework


## Dependency
* Apache/Nginx
* PHP 7.3 - 8.1
* Composer
* Mysql 5.7



## Installation

Use the powershell/terminal for the installation.

```bash
$ git clone https://github.com/rengawan/laravel-restfull-api.git
$ composer install
$ composer dump-autoload
$ cp .env.example .env
```
* Configure mysql database and create database schema
* Configure the .env file
* Run database migration with this command bellow
```bash
$ php artisan migrate:fresh --seed
```


## Usage

```bash
$ php artisan serve
```
you can import postman collection with file Laravel Rest Api.postman_collection.json and configure variables at collection level

