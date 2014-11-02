<?php

/**
 * This file is part of peridot-expectation package.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Evenement\EventEmitterInterface;
use expectation\peridot\PeridotExpectation;
use Prophecy\Prophet;
use Prophecy\Argument;


describe('PeridotExpectation', function() {

    describe('#register', function() {
        beforeEach(function() {
            $this->prophet = new Prophet();

            $emitter = $this->prophet->prophesize('Evenement\EventEmitterInterface');
            $emitter->once(
                Argument::exact('peridot.start'),
                Argument::type('callable')
            )->shouldBeCalled();

            $this->peridot = new PeridotExpectation();
            $this->peridot->register($emitter->reveal());
        });
        it('register expectation plugin', function() {
            $this->prophet->checkPredictions();
        });
    });

    describe('#unregister', function() {
        beforeEach(function() {
            $this->prophet = new Prophet();

            $emitter = $this->prophet->prophesize('Evenement\EventEmitterInterface');
            $emitter->removeListener(
                Argument::exact('peridot.start'),
                Argument::type('callable')
            )->shouldBeCalled();

            $this->peridot = new PeridotExpectation();
            $this->peridot->unregister($emitter->reveal());
        });
        it('unregister expectation plugin', function() {
            $this->prophet->checkPredictions();
        });
    });

});
