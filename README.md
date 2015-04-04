peridot-expect-plugin
======================================

Expectation for [peridot](https://github.com/peridot-php/peridot)

[![Latest Stable Version](https://poser.pugx.org/expect/peridot-expect-plugin/v/stable.svg)](https://packagist.org/packages/expectation/peridot-expect-plugin) [![Latest Unstable Version](https://poser.pugx.org/expect/peridot-expect-plugin/v/unstable.svg)](https://packagist.org/packages/expectation/peridot-expect-plugin)
[![Dependency Status](https://www.versioneye.com/user/projects/551fa0b6971f7843390002ef/badge.svg?style=flat)](https://www.versioneye.com/user/projects/551fa0b6971f7843390002ef)
[![Build Status](https://travis-ci.org/expectation-php/peridot-expect-plugin.svg?branch=master)](https://travis-ci.org/expectation-php/peridot-expect-plugin)
[![HHVM Status](http://hhvm.h4cc.de/badge/expect/peridot-expect-plugin.svg)](http://hhvm.h4cc.de/package/expect/peridot-expect-plugin)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/expectation-php/peridot-expect-plugin/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/expectation-php/peridot-expect-plugin/?branch=master)
[![Coverage Status](https://coveralls.io/repos/expectation-php/peridot-expect-plugin/badge.png?branch=master)](https://coveralls.io/r/expectation-php/peridot-expect-plugin?branch=master)
[![Stories in Ready](https://badge.waffle.io/expectation-php/peridot-expect-plugin.png?label=ready&title=Ready)](https://waffle.io/expectation-php/peridot-expect-plugin)

Installation
------------------

Installation that uses the composer

Please add the following items to composer.json.  
Then please run the composer install.

```php
{
    "require-dev": {
        "expectation/peridot-expect-plugin": "2.0.0"
    }
}
```

Basic usage
------------------

It can be used by simply append the set to **peridot.php**.

```php
use expect\peridot\ExpectPlugin;

return function(EventEmitterInterface $emitter) {
    ExpectPlugin::create()->registerTo($emitter);
};
```

or

How to configure can be found [here](https://github.com/expectation-php/expect).


```php
use expect\peridot\ExpectPlugin;

return function(EventEmitterInterface $emitter) {
    ExpectPlugin::createWithConfig('.expect.toml')->registerTo($emitter);
};
```



Examples of spec
------------------

You can easily use in the spec file.

```php
describe('Example', function() {
    describe('#create', function() {
        it('return instance', function() {
            expect(Example::create())->toBeAnInstanceOf('Example')
        });
    });
});
```
