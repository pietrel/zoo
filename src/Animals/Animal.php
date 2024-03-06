<?php

namespace Pietrel\Zoo\Animals;

use Pietrel\Zoo\Enums\Animals;
use Pietrel\Zoo\Enums\Food;

abstract class Animal
{
    public function __construct(protected string $name) {}

    public function __toString(): string
    {
        return $this->getSpecies()->value.' '.$this->name.PHP_EOL;
    }

    abstract public function getSpecies(): Animals;

    abstract public function feed(Food $food);
}
