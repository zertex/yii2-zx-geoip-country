Yii 2 GeoIP Country extension - Zertex CMS
==========================================

Provides information about country of user by IP address.

Currently available:
* Country
* Country ISO Code

## Install

Run

```bash
$ php composer.phar require zertex/yii2-zx-geoip-country "~1.0"
```

#### OR 

add to your `composer.json`

```json
{
    "require": {
        "zertex/yii2-zx-geoip-country": "~1.0"
    }
}
```

and run

```bash
$ php composer update
```


## Usage

### Like component

```php
<?php

$config = [
    ...
    'components' => [
        'geoip' => ['class' => 'zertex\GeoIP\GeoIP'],
    ]
    ...
];
```

somewhere in code

```php
$ip = Yii::$app->geoip->ip(); // current user ip

$ip = Yii::$app->geoip->ip("111.111.111.111");

$ip->country; // "United States"

```

### Like object directly somewhere in your application

```php
$geoip = new \zertex\GeoIP\GeoIP();
$ip = $geoip->ip("111.111.111.111");

$ip->country; // "United States"
```

This product includes GeoLite2 data created by MaxMind, available from http://www.maxmind.com
