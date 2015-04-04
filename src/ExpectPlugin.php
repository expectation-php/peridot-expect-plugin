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

use expect\Expect;
use expect\configurator\FileConfigurator;
use Evenement\EventEmitterInterface;


/**
 * Class ExpectPlugin
 * @package expect\peridot
 */
class ExpectPlugin implements Registrar
{

    /**
     * @var string
     */
    private $configFilePath;


    /**
     * @param string|null $configurationFile
     */
    public function __construct($configFilePath = null)
    {
        $this->configFilePath = $configFilePath;
    }

    /**
     * @return ExpectPlugin
     */
    public static function create()
    {
        return new self();
    }

    /**
     * @param string $configFilePath
     * @return ExpectPlugin
     */
    public static function createWithConfig($configFilePath)
    {
        return new self($configFilePath);
    }

    /**
     * @return null|string
     */
    public function getConfigurationFilePath()
    {
        return $this->configFilePath;
    }

    /**
     * @return bool
     */
    public function isEmptyConfig()
    {
        return is_null($this->getConfigurationFilePath());
    }

    /**
     * {@inheritdoc}
     */
    public function registerTo(EventEmitterInterface $emitter)
    {
        $emitter->once(static::START_EVENT, [ $this, 'onPeridotStart' ]);
    }

    public function onPeridotStart()
    {
        if ($this->isEmptyConfig()) {
            Expect::configure();
        } else {
            $configurator = new FileConfigurator($this->getConfigurationFilePath());
            Expect::configure($configurator);
        }

        require_once __DIR__  . '/DSL.php';
    }

}
