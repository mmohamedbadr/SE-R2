# Studio app-APIs v1
this is main APIs of studio management base on Laravel Framework 8.61.0

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation gives you a complete toolset required to build any application with which you are tasked.

# Dependencies
- apache2 2.4
- php: +7.3
- fill .env
- run ./php-extensions.sh
- run ./updateComposer.sh
- run ./generateDocs.sh
- run ./clearCache.sh 
- Set following values in  /etc/php/7.3/cli/php.ini
    - post_max_size = 8000M
    - upload_max_filesize = 2000M
    - memory_limit = 1280M
    - max_execution_time = 300


## To start system  app-api:
    php -S localhost:8000 -t .
    php artisan --port=8000 .

## To run queue "background processes like mails & bulk actions"
    php artisan queue:work

## Packages

- jenssegers/mongodb +3.8 [Documentation](https://github.com/jenssegers/laravel-mongodb)

    This package adds functionalities to the Eloquent model and Query builder for MongoDB, using the original Laravel API. This library extends the original Laravel classes, so it uses exactly the same methods.

- mpociot/laravel-apidoc-generator +4.8 [Documentation](https://packagist.org/packages/mpociot/laravel-apidoc-generator)

    - Automatically generate your API documentation from your existing Laravel routes.
    - For laravel v^8 
           add both command to composer.json and run composer update & composer install 
            "mpociot/documentarian": "dev-master as 0.4.0",
            "mpociot/laravel-apidoc-generator": "dev-master" 
    -to run php artisan apidoc:generate


- nunomaduro/larastan [Package] (https://packagist.org/packages/nunomaduro/larastan) [Documentation](https://phpstan.org/user-guide/getting-started) 
    - Larastan - Discover bugs in your code without running it. A phpstan/phpstan wrapper for Laravel
    - to run vendor/bin/phpstan analyse

- nunomaduro/phpinsights [Documentation] (https://packagist.org/packages/nunomaduro/phpinsights#v1.x-dev)
    - Instant PHP quality checks from your console.
    - to run ./vendor/bin/phpinsights

- guzzlehttp/guzzle +7.3 [Documentation](https://packagist.org/packages/guzzlehttp/guzzle)

    Guzzle is a PHP HTTP client that makes it easy to send HTTP requests and trivial to integrate with web services.

- cocur/slugify +4.0  [Documentation](https://packagist.org/packages/cocur/slugify)

    Converts a string into a slug.

- giggsey/libphonenumber-for-php +8.11  [Documentation](https://packagist.org/packages/giggsey/libphonenumber-for-php)  

    A PHP library for parsing, formatting, storing and validating international phone numbers. This library is based on Google's libphonenumber.


- wildbit/postmark-php +4.0  [Documentation](https://packagist.org/packages/wildbit/postmark-php)  

    With Postmark, you can send and receive emails effortlessly.

- firebase/php-jwt  [Documentation](https://packagist.org/packages/firebase/php-jwt)  

  A simple library to encode and decode JSON Web Tokens (JWT) in PHP. Should conform to the current spec.

- phpoffice/phpspreadsheet +1.6  [Documentation](https://packagist.org/packages/phpoffice/phpspreadsheet)

    PHPSpreadsheet - Read, Create and Write Spreadsheet documents in PHP - Spreadsheet engine