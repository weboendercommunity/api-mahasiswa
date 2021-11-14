# API MAHASISWA
this repository provide API to Mahasiswa application, the entire application is made by using laravel 8, This application is the result of conducting a security distributed system practicum

## Requirements
- composer 2.x
- laravel 8
- php >= 7.4

## Installation
- first clone this repo
``` bash
$ git clone https://github.com/weboendercommunity/api-mahasiswa
```
- go into the project directory
``` bash
$ cd api-mahasiswa
```
- then install the laravel
``` bash
$ composer install
```
- after that copy the `.env.example` file and update it using your database credentials
``` bash
$ cp .env.example .env
```
- do artisan migrate
``` bash
$ php artisan migrate
```
- lastly serve your server
``` bash
$ php artisan serve
```

## API Documentation
- https://documenter.getpostman.com/view/15292396/UVC8Dm2X