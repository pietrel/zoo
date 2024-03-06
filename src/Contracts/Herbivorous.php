<?php

namespace Pietrel\Zoo\Contracts;

use Pietrel\Zoo\Enums\Food;

interface Herbivorous
{
    public function feed(Food $food): void;
}
