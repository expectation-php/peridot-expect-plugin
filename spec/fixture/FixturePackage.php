<?php

namespace expect\peridot\spec\fixture;

use expect\MatcherPackage;
use expect\MatcherRegistry;
use expect\PackageRegistrar;

class FixturePackage implements PackageRegistrar
{
    public function registerTo(MatcherRegistry $registry)
    {
        $package = new MatcherPackage('expect\\peridot\\spec\\fixture\\matcher', __DIR__ . '/matcher');
        $package->registerTo($registry);
    }
}
