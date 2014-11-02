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

use expectation\Expectation;
use Evenement\EventEmitterInterface;


/**
 * Class ExpectationRegistrar
 * @package expectation\peridot
 */
class ExpectationRegistrar implements RegistrarInterface
{

    /**
     * @var string
     */
    private $configurationFile;


    /**
     * @param string|null $configurationFile
     */
    public function __construct($configurationFile = null)
    {
        $this->configurationFile = $configurationFile;
    }


    /**
     * {@inheritdoc}
     */
    public function register(EventEmitterInterface $emitter)
    {
        $emitter->once(static::START_EVENT, [$this, 'configure']);
    }

    /**
     * {@inheritdoc}
     */
    public function unregister(EventEmitterInterface $emitter)
    {
        $emitter->removeListener(static::START_EVENT, [$this, 'configure']);
    }

    protected function configure()
    {
        Expectation::configureWithFile($this->configurationFile);
    }

}
