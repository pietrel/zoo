<?php

namespace Pietrel\Zoo\Errors;

use Pietrel\Zoo\Enums\Food;

class FeedingError extends \Exception
{
    public function __construct(Food $food)
    {
        parent::__construct("Nie można karmić zwierząt {$food->value}");
    }
}
