<?php

namespace Pietrel\Zoo\Concerns;

use Pietrel\Zoo\Enums\Food;
use Pietrel\Zoo\Errors\FeedingError;

trait EatPlants
{
    public function feed(Food $food): void
    {
        if (Food::Plants === $food) {
            echo "Zwierzę je rośliny\n";
        } else {
            throw new FeedingError($food);
        }
    }
}
