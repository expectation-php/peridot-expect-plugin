peridot-expectation
===================

Expectation for peridot

[![Build Status](https://travis-ci.org/expectation-php/peridot-expectation.svg)](https://travis-ci.org/expectation-php/peridot-expectation)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/expectation-php/peridot-expectation/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/expectation-php/peridot-expectation/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/5456291c22b4fba1150002ae/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5456291c22b4fba1150002ae)


Basic usage
------------------

```php
use expectation\peridot\ExpectationPlugin;

return function(EventEmitterInterface $emitter) {
	$plugin = new ExpectationPlugin();
	$plugin->register($emitter);
};
```
