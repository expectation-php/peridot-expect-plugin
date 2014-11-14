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

/**
 * @param mixed $actual
 * @return \expectation\Evaluator
 */
function expect($actual)
{
    return Expectation::expect($actual);
}
