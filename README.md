# Shorty

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Google Url Shortener API Package for Laravel 5.1. Library to shorten URLs, expand URLs, and get stats for shorten URLs. e.g. **goo.gl/XXXXX**

## Installation

To install, run the following in your project directory

``` bash
$ composer require mbarwick83/shorty
```

Then in `config/app.php` add the following to the `providers` array:

```
Mbarwick83\Shorty\ShortyServiceProvider::class
```

Also in `config/app.php`, add the Facade class to the `aliases` array:

```
'Shorty'    => Mbarwick83\Shorty\Facades\Shorty::class
```

## Configuration

To publish Shorty's configuration file, run the following `vendor:publish` command:

```
php artisan vendor:publish --provider="Mbarwick83\Shorty\ShortyServiceProvider"
```

This will create a shorty.php in your config directory. Here you **must** enter your Google Shortener URL API Key. Get an API key at [https://developers.google.com/url-shortener/v1/getting_started#APIKey](https://developers.google.com/url-shortener/v1/getting_started#APIKey).

## Usage

#####To shorten a URL:

``` php
$url = "http://google.com";

Shorty::shorten($url);

// returns, http://goo.gl/XXXXX
```

#####To expand a shortened URL:

``` php
$url = "http://goo.gl/XXXXX";

Shorty::expand($url);

// returns, http://google.com
```

#####To get stats on shortened URL:

``` php
$url = "http://goo.gl/XXXXX";

Shorty::stats($url);
```

*If successful, stats response will return:*

```
{
 "kind": "urlshortener#url",
 "id": "http://goo.gl/fbsS",
 "longUrl": "http://www.google.com/",
 "status": "OK",
 "created": "2009-12-13T07:22:55.000+00:00",
 "analytics": {
  "allTime": {
   "shortUrlClicks": "3227",
   "longUrlClicks": "9358",
   "referrers": [ { "count": "2160", "id": "Unknown/empty" } /* , ... */ ],
   "countries": [ { "count": "1022", "id": "US" } /* , ... */ ],
   "browsers": [ { "count": "1025", "id": "Firefox" } /* , ... */ ],
   "platforms": [ { "count": "2278", "id": "Windows" } /* , ... */ ]
  },
  "month": { /* ... */ },
  "week": { /* ... */ },
  "day": { /* ... */ },
  "twoHours": { /* ... */ }
 }
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/league/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/thephpleague/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/thephpleague/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/thephpleague/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/league/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/league/:package_name
[link-travis]: https://travis-ci.org/thephpleague/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/thephpleague/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/thephpleague/:package_name
[link-downloads]: https://packagist.org/packages/league/:package_name
[link-author]: https://github.com/mbarwick83
[link-contributors]: ../../contributors
