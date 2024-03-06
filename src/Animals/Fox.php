<?php

namespace Pietrel\Zoo\Animals;

use Pietrel\Zoo\Concerns\EatMeat;
use Pietrel\Zoo\Concerns\FurMaintenance;
use Pietrel\Zoo\Contracts\Carnivorous;
use Pietrel\Zoo\Contracts\HasFur;
use Pietrel\Zoo\Enums\Animals;

class Fox extends Animal implements HasFur, Carnivorous
{
    use EatMeat;
    use FurMaintenance;

    public function getSpecies(): Animals
    {
        return Animals::Fox;
    }
}
