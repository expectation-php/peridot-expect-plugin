<?php

/**
 * This file is part of peridot-expectation package.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace expect\peridot\spec\fixture\matcher;

use expect\FailedMessage;
use expect\matcher\ReportableMatcher;

/**
 * Class ToFixtureTrue
 */
class ToFixtureTrue implements ReportableMatcher
{

    public function match($actual)
    {
        return $actual === true;
    }

    /**
     * {@inheritdoc}
     */
    public function reportFailed(FailedMessage $message)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function reportNegativeFailed(FailedMessage $message)
    {
    }

}
