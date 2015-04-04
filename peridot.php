<?php

use cloak\peridot\CloakPlugin;
use Evenement\EventEmitterInterface;

return function(EventEmitterInterface $emitter) {
    if (defined('HHVM_VERSION') === false) {
        CloakPlugin::create('.cloak.toml')->registerTo($emitter);
    }
};
