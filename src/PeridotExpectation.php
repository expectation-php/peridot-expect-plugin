<?php

/**
 * This file is part of peridot-expectation package.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace expectation\peridot;

use Evenement\EventEmitterInterface;

/**
 * Class PeridotExpectation
 * @package expectation\peridot
 */
class PeridotExpectation
{

    /**
     * @param EventEmitterInterface $emitter
     */
    public function register(EventEmitterInterface $emitter)
    {
        $emitter->once('peridot.start', [$this, 'configure']);
    }

    /**
     * @param EventEmitterInterface $emitter
     */
    public function unregister(EventEmitterInterface $emitter)
    {
        $emitter->removeListener('peridot.start', [$this, 'configure']);
    }

    protected function configure()
    {
    }

}
