<?php

use cloak\peridot\CloakPlugin;
use Evenement\EventEmitterInterface;

return function(EventEmitterInterface $emitter) {
    CloakPlugin::create('.cloak.toml')->registerTo($emitter);
};
