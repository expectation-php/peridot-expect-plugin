<?php

use \Robo\Tasks;
use coverallskit\Configuration;
use coverallskit\ReportBuilder;

/**
 * Class RoboFile
 */
class RoboFile extends Tasks
{

    public function specAll()
    {
        return $this->taskExec('vendor/bin/peridot spec')->run();
    }

    public function specCoveralls()
    {
        $configuration = Configuration::loadFromFile('coveralls.toml');
        $builder = ReportBuilder::fromConfiguration($configuration);
        $builder->build()->save()->upload();
    }

}
