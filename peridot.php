<?php

use Evenement\EventEmitterInterface;
use cloak\Analyzer;
use cloak\configuration\ConfigurationLoader;

return function(EventEmitterInterface $emitter) {

    $loader = new ConfigurationLoader();
    $configuration = $loader->loadConfiguration('cloak.toml');
    $analyzer = new Analyzer($configuration);

    $emitter->on('peridot.start', function() use ($analyzer) {
        $analyzer->start();
    });
    $emitter->on('peridot.end', function() use ($analyzer) {
        $analyzer->stop();
    });

};
