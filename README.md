# Laravel TAL

TAL (Template Attribute Language) template engine for Laravel and Lumen

## Installation For Laravel

Require this package with Composer

```bash
$ composer require iamproperty/laravel-tal
```

If you don't use package auto-discovery you can add the service provider to your `config.app.php`.

```php
'providers' => [
    IAMProperty\LaravelTal\TalServiceProvider::class, 
]
```

## Installation For Lumen

Require this package with Composer

```bash
$ composer require iamproperty/laravel-tal
```

Register the service provider in your `bootstrap/app.php`

```php
$app->register(IAMProperty\LaravelTal\TalServiceProvider::class);
```

## Configuration

If you need to configure *laravel-tal* you can change setting in the configuration file.

### Laravel

Publish the config file

```bash
$ php artisan vendor:publish --provider "IAMProperty\LaravelTal\TalServiceProvider"
```

### Lumen

Copy the `vendor/iamproperty/laravel-tal/config/tal.php` file to your local config directory.

```php
$app->configure('tal');
```
