# Laravel Favorite (Laravel 5, 6 Package)


**Allows Laravel Eloquent models to implement a 'sluggable' feature.**

## Index

- [Installation](#installation)
- [Usage](#usage)

## Installation

1) Install the package via Composer

```bash
$ composer require ifranksmith/laravel-favorite
```

2) In Laravel >=5.5 this package will automatically get registered. For older versions, update your `config/app.php` by adding an entry for the service provider.

```php
'providers' => [
    // ...
    IFrankSmith\Sluggable\SluggableServiceProvider
];
```

## Usage

Your models should import the `Traits/Sluggable.php` trait and use it.
(see an example below):

```php
use IFrankSmith\Sluggable\Traits\Sluggable;

class Posts extends Model
{
	use Sluggable;
}
```

By default, this package will generate slug from the 'name' property of the mmodel and save it to the 'slug' property of the model.

However, if your model does not use those properties, you need to create a method on your model that returns the respective column and source.
For example, if you want to make slug from 'title' to 'title_slug' property, you need to use it as shown below

```php
use IFrankSmith\Sluggable\Traits\Sluggable;

class Posts extends Model
{
    use Sluggable;
    
    public function sluggable()
    {
        return [
            "column" => "title_slug",
            "source" => "title",
        ];
    }
}
```

That's it ... your model is now **"sluggable"**!


<!-- 
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ChristianKuri/laravel-favorite.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ChristianKuri/laravel-favorite/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/ChristianKuri/laravel-favorite.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/ChristianKuri/laravel-favorite.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ChristianKuri/laravel-favorite.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/ChristianKuri/laravel-favorite
[link-travis]: https://travis-ci.org/ChristianKuri/laravel-favorite
[link-scrutinizer]: https://scrutinizer-ci.com/g/ChristianKuri/laravel-favorite/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/ChristianKuri/laravel-favorite
[link-downloads]: https://packagist.org/packages/ChristianKuri/laravel-favorite
[link-author]: https://github.com/ChristianKuri
[link-contributors]: ../../contributors -->
