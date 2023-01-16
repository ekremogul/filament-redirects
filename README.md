# Create and Control Page Redirects through Filament 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jkharley/filament-redirects.svg?style=flat-square)](https://packagist.org/packages/:vendor_slug/:package_slug)
[![Total Downloads](https://img.shields.io/packagist/dt/:vendor_slug/:package_slug.svg?style=flat-square)](https://packagist.org/packages/jkharley/filament-redirects)

A [Filament](https://filamentphp.com/) resource to create and maintain page redirects for your website.

## Installation

You can install the package via composer:

```bash
composer require jkharley/filament-redirects
```

Register the middleware within the `web` middleware group array inside of `App/Http/Kernel.php`
```php
\JamesHarley\FilamentRedirects\Middleware\RedirectMiddleware::class
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-redirects-migrations"
php artisan migrate
```

## Usage
Once setup you should now see a new `redirects` resource.

![Screenshot 2022-04-22 at 11 51 44](https://user-images.githubusercontent.com/27085725/164701067-1faeb7f9-b7b7-4a05-a057-8de085c28430.png)

You can create new redirects from within the new `redirects` resource and add a specified status code with the option to enable or disable the redirect.

![Screenshot 2022-04-22 at 11 52 53](https://user-images.githubusercontent.com/27085725/164701219-57b173c7-04e3-4ef4-8a47-ea992d6c718b.png)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [James Harley](https://github.com/jkharley)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
