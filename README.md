Session library for PHP
=================

[![Build Status](https://travis-ci.org/romeOz/rock-session.svg?branch=master)](https://travis-ci.org/romeOz/rock-session)
[![HHVM Status](http://hhvm.h4cc.de/badge/romeoz/rock-session.svg)](http://hhvm.h4cc.de/package/romeoz/rock-session)
[![Coverage Status](https://coveralls.io/repos/romeOz/rock-session/badge.svg?branch=master)](https://coveralls.io/r/romeOz/rock-session?branch=master)
[![License](https://poser.pugx.org/romeOz/rock-session/license.svg)](https://packagist.org/packages/romeOz/rock-session)

Quick Start
-------------------

####Session as key-value memory storage

```php
$config = [
    'cache' => new \rock\cache\Memcached
];
$session = new \rock\session\MemorySession($config);
$session->add('name', 'Tom');

echo $session->get('name'); // result: Tom
```

####Session as MongoDB storage

```php
$config = [
    'connection' => new \rock\mongodb\Connection
];
$session = new \rock\session\MongoSession($config);
$session->add('name', 'Tom');

echo $session->get('name'); // result: Tom
```

Default is used the garbage collector (GC). You can use [TTL indexes](http://docs.mongodb.org/manual/tutorial/expire-data/).

```php
$connection = new \rock\mongodb\Connection;

// Create TTL index
$connection
    ->getCollection('session')
    ->createIndex('expire', ['expireAfterSeconds' => 0]);

$config = [
    'connection' => $connection,
    'useGC' => false
];
$session = new \rock\session\MongoSession($config);
$session->add('name', 'Tom');

echo $session->get('name'); // result: Tom
```

Requirements
-------------------
 * PHP 5.4+
 * [Rock Cache](https://github.com/romeOz/rock-cache) **(optional)**. Should be installed: `composer require romeoz/rock-cache:*`
 * [Rock MongoDB](https://github.com/romeOz/rock-mongodb) **(optional)**. Should be installed: `composer require romeoz/rock-mongodb:*`

License
-------------------

Session library is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).