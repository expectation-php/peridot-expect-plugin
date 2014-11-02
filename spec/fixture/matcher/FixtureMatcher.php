<?php

/**
 * This file is part of peridot-expectation package.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace expectation\peridot\spec\fixture\matcher;


use expectation\matcher\annotation\Lookup;
use expectation\AbstractMatcher;


/**
 * Class FixtureMatcher
 */
class FixtureMatcher extends AbstractMatcher
{

    /**
     * @Lookup(name="toFixtureTrue")
     * @param mixed $actual
     * @return bool
     */
    public function match($actual)
    {
        return $actual === true;
    }

    /**
     * @return string
     */
    public function getFailureMessage()
    {
    }

    /**
     * @return string
     */
    public function getNegatedFailureMessage()
    {
    }

}
