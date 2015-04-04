<?php

/**
 * This file is part of peridot-expectation package.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace expect\peridot;

use Evenement\EventEmitterInterface;


/**
 * Interface Registrar
 * @package expect\peridot
 */
interface Registrar
{

    const START_EVENT = 'runner.start';

    /**
     * @param EventEmitterInterface $emitter
     */
    public function registerTo(EventEmitterInterface $emitter);

}
