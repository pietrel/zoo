<?php

namespace Pietrel\Zoo\Animals;

use Pietrel\Zoo\Concerns\EatPlants;
use Pietrel\Zoo\Concerns\FurMaintenance;
use Pietrel\Zoo\Contracts\HasFur;
use Pietrel\Zoo\Contracts\Herbivorous;
use Pietrel\Zoo\Enums\Animals;

class Rabbit extends Animal implements HasFur, Herbivorous
{
    use EatPlants;
    use FurMaintenance;

    public function getSpecies(): Animals
    {
        return Animals::Rabbit;
    }
}
