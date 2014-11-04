<?php

/**
 * This file is part of peridot-expectation package.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */


use expectation\Expectation;
use expectation\peridot\ExpectationPlugin;
use expectation\peridot\RegistrarInterface;
use Evenement\EventEmitter;
use Assert\Assertion;


describe('ExpectationPlugin', function() {
    describe('#register', function() {
        context('when default', function() {
            beforeEach(function() {
                $this->emitter = new EventEmitter();
                $this->registrar = new ExpectationPlugin();
                $this->registrar->register($this->emitter);
                $this->emitter->emit(RegistrarInterface::START_EVENT);
            });
            it('load default matchers', function() {
                Expectation::expect(true)->toBeTrue();
            });
        });
        context('when use configration file', function() {
            beforeEach(function() {
                $this->emitter = new EventEmitter();
                $this->registrar = new ExpectationPlugin(__DIR__ . '/fixture/config.php');
                $this->registrar->register($this->emitter);
                $this->emitter->emit(RegistrarInterface::START_EVENT);
            });
            it('load custom matchers', function() {
                Expectation::expect(true)->toFixtureTrue();
            });
            it('load default matchers', function() {
                Expectation::expect(true)->toBeTrue();
            });
        });
    });
    describe('#unregister', function() {
        beforeEach(function() {
            $this->emitter = new EventEmitter();
            $this->registrar = new ExpectationPlugin(__DIR__ . '/fixture/config.php');
            $this->registrar->register($this->emitter);
            $this->registrar->unregister($this->emitter);
            $this->listeners = $this->emitter->listeners(RegistrarInterface::START_EVENT);
        });
        it('unregister expectation plugin', function() {
            Assertion::count($this->listeners, 0);
        });
    });

});