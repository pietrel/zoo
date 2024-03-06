<?php

namespace Pietrel\Zoo\Contracts;

use Pietrel\Zoo\Enums\Food;

interface Carnivorous
{
    public function feed(Food $food): void;
}
