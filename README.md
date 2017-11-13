# Introduction
Gradian provides an glorified way to add categorized ratings to the contents with using it self. Gradian can able to create quetion based -categorized ratings to the model instances with the help of traits.

# License
Gradian is open-sourced software licensed under the BSD-2 license

# Official Documentation
If you need a category based rating services such as amazon feedbacks, it's the simplest way of it. You can easly create labels for the ratings and you user can able to rate with those labels for the spesific model instance.

## Installation
To get started with Gradian, use Composer to add the package to your project's dependencies:

```php
composer require kaankilic/gradian
```

After installing the Gradian library, register the Kaankilic\Gradian\Providers\GradianServiceProvider in your config/app.php configuration file:

```php
Kaankilic\Gradian\Providers\GradianServiceProvider::class,
```

Also, add the Gradian facade to the aliases array in your app configuration file:

```php
Kaankilic\Gradian\Facades\Gradian::class
```

Lastly, Publish the config and language files.

php artisan vendor:publish --provider="Kaankilic\Gradian\Providers\GradianServiceProvider"
This command will generate the configrations on your /config folder, and generate the default language folder on your project.


