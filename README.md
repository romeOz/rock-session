Session module for [Rock Framework](https://github.com/romeOz/rock)
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
$session = new \rock\cache\MemorySession($config);
$session ->add('name', 'Tom');

echo $session->get('name'); // result: Tom
```

Requirements
-------------------
 * **PHP 5.4+**

License
-------------------

Session module for [Rock Framework](https://github.com/romeOz/rock) is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).