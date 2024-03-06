<?php

namespace Pietrel\Zoo\Contracts;

use Pietrel\Zoo\Enums\Food;

interface Omnivorous
{
    public function feed(Food $food): void;
}
