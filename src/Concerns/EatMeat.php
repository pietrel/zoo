<?php

namespace Pietrel\Zoo\Concerns;

use Pietrel\Zoo\Enums\Food;
use Pietrel\Zoo\Errors\FeedingError;

trait EatMeat
{
    public function feed(Food $food): void
    {
        if (Food::Meat === $food) {
            echo "Zwierzę je mięso\n";
        } else {
            throw new FeedingError($food);
        }


    }
}
