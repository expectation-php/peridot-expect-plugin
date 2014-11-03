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
use expectation\peridot\ExpectationRegistrar;
use expectation\peridot\RegistrarInterface;
use Prophecy\Prophet;
use Prophecy\Argument;
use Evenement\EventEmitter;


describe('ExpectationRegistrar', function() {
    describe('#register', function() {
        context('when default', function() {
            beforeEach(function() {
                $this->emitter = new EventEmitter();
                $this->registrar = new ExpectationRegistrar();
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
                $this->registrar = new ExpectationRegistrar(__DIR__ . '/fixture/config.php');
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
            $this->prophet = new Prophet();

            $emitter = $this->prophet->prophesize('Evenement\EventEmitterInterface');
            $emitter->removeListener(
                Argument::exact('peridot.start'),
                Argument::any()
            )->shouldBeCalled();

            $this->peridot = new ExpectationRegistrar();
            $this->peridot->unregister($emitter->reveal());
        });
        it('unregister expectation plugin', function() {
            $this->prophet->checkPredictions();
        });
    });

});
