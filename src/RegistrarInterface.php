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
 * Interface RegistrarInterface
 * @package expectation\peridot
 */
interface RegistrarInterface
{

    const START_EVENT = 'peridot.start';

    /**
     * @param EventEmitterInterface $emitter
     */
    public function register(EventEmitterInterface $emitter);

}
