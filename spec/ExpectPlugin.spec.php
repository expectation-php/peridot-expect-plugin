<?php

/**
 * This file is part of peridot-expectation package.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */


use expect\peridot\ExpectPlugin;
use expect\peridot\Registrar;
use Evenement\EventEmitter;
use Assert\Assertion;


describe(ExpectPlugin::class, function() {

    describe('#create', function() {
        beforeEach(function() {
            $this->plugin = ExpectPlugin::create();
        });
        it('return plugin instance', function() {
            Assertion::isInstanceOf($this->plugin, ExpectPlugin::class);
        });
    });

    describe('#createWithConfig', function() {
        beforeEach(function() {
            $this->path = __DIR__ . '/fixture/.expect.toml';
            $this->plugin = ExpectPlugin::createWithConfig($this->path);
        });
        it('return plugin instance', function() {
            Assertion::isInstanceOf($this->plugin, ExpectPlugin::class);
        });
        it('assign configuration file', function() {
            Assertion::same($this->plugin->getConfigurationFilePath(), $this->path);
        });
    });

    describe('#registerTo', function() {
        context('when default', function() {
            beforeEach(function() {
                $emitter = new EventEmitter();
                ExpectPlugin::create()->registerTo($emitter);
                $emitter->emit(Registrar::START_EVENT);
                $this->listeners = $emitter->listeners(Registrar::START_EVENT);
            });
            it('load default matchers', function() {
                expect(true)->toBeTrue();
            });
            it('removed from the listener', function() {
                Assertion::count($this->listeners, 0);
            });
        });
        context('when use configuration file', function() {
            beforeEach(function() {
                $this->emitter = new EventEmitter();
                ExpectPlugin::createWithConfig(__DIR__ . '/fixture/.expect.toml')
                    ->registerTo($this->emitter);

                $this->emitter->emit(Registrar::START_EVENT);
            });
            it('load custom matchers', function() {
                expect(true)->toFixtureTrue();
            });
            it('load default matchers', function() {
                expect(true)->toBeTrue();
            });
            it('removed from the listener', function() {
                Assertion::count($this->listeners, 0);
            });
        });
    });

});
