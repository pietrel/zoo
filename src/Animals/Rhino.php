<?php

namespace Pietrel\Zoo\Animals;

use Pietrel\Zoo\Concerns\EatPlants;
use Pietrel\Zoo\Contracts\Herbivorous;
use Pietrel\Zoo\Enums\Animals;

class Rhino extends Animal implements Herbivorous
{
    use EatPlants;

    public function getSpecies(): Animals
    {
        return Animals::Rhino;
    }
}
