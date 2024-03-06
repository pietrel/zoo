<?php

namespace Pietrel\Zoo\Animals;

use Pietrel\Zoo\Concerns\EatPlants;
use Pietrel\Zoo\Contracts\Herbivorous;
use Pietrel\Zoo\Enums\Animals;

class Elephant extends Animal implements Herbivorous
{
    use EatPlants;

    public function getSpecies(): Animals
    {
        return Animals::Elephant;
    }
}
