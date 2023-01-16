# Create and Control Page Redirects through Filament 

A [Filament](https://filamentphp.com/) resource to create and maintain page redirects for your website.

## Installation

You can install the package via composer:

```bash
composer require ekremogul/filament-redirects
```

Register the middleware within the `$middleware` middleware group array inside of `App/Http/Kernel.php`
```php
protected $middleware = [
        ...
        \Ekremogul\FilamentRedirects\Middleware\RedirectMiddleware::class
    ];
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-redirects-migrations"
php artisan migrate
```
