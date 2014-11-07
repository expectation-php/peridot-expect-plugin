peridot-expectation
===================

Expectation for [peridot](https://github.com/peridot-php/peridot)

[![Build Status](https://travis-ci.org/expectation-php/peridot-expectation.svg)](https://travis-ci.org/expectation-php/peridot-expectation)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/expectation-php/peridot-expectation/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/expectation-php/peridot-expectation/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/5456291c22b4fba1150002ae/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5456291c22b4fba1150002ae)
[![Stories in Ready](https://badge.waffle.io/expectation-php/peridot-expectation.png?label=ready&title=Ready)](https://waffle.io/expectation-php/peridot-expectation)

Installation
------------------

Installation that uses the composer

Please add the following items to composer.json.  
Then please run the composer install.

```php
{
    "require-dev": {
        "expectation/peridot-expectation": "1.0.0"
    }
}
```

Basic usage
------------------

It can be used by simply append the set to **peridot.php**.

```php
use expectation\peridot\ExpectationPlugin;

return function(EventEmitterInterface $emitter) {
	$plugin = new ExpectationPlugin();
	$plugin->register($emitter);
};
```
