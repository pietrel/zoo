<?php

namespace Pietrel\Zoo\Concerns;

use Pietrel\Zoo\Enums\Food;

trait EatMeatAndPlants
{
    public function feed(Food $food): void
    {
        if (Food::Meat === $food || Food::Plants === $food) {
            echo "Zwierzę je {$food->value}\n";
        }
    }
}
