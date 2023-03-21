# Laravel client for the Looking Glass monitoring application 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cxj/laravel-looking-glass-client.svg?style=flat-square)](https://packagist.org/packages/cxj/laravel-looking-glass-client)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/cxj/laravel-looking-glass-client/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/cxj/laravel-looking-glass-client/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/cxj/laravel-looking-glass-client/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/cxj/laravel-looking-glass-client/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/cxj/laravel-looking-glass-client.svg?style=flat-square)](https://packagist.org/packages/cxj/laravel-looking-glass-client)

This is an easy to use Laravel client for the [Looking Glass](https://github.com/cxj/looking-glass)
application status and health monitoring web application.  This package makes it easy 
for any Laravel application to report any status or health data to Looking Glass.

## Installation

You can install the package via composer:

```bash
composer require cxj/laravel-looking-glass-client
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-looking-glass-client-config"
```

This is the contents of the published config file:

```php
return [
    'url'    => env('LOOKING_GLASS_URL', 'localhost:8000/api/webhook'),
    'secret' => env('LOOKING_GLASS_SECRET', 'shared-secret'),
];
```

## Usage

```php
$result = Cxj\Result::make('Test message from your application');

$glass = new Cxj\LookingGlass();
$glass->transmit('Name of Test or Status', $result);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Chris Johnson](https://github.com/cxj)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
