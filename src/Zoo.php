<?php

namespace Pietrel\Zoo;

use Pietrel\Zoo\Animals\Animal;

class Zoo extends Singleton
{
    private array $animals = [];

    public function addAnimal(Animal $animal): void
    {
        $this->animals[] = $animal;
    }

    public function getAnimals(): array
    {
        return $this->animals;
    }

    public function showAnimals(): void
    {
        foreach ($this->animals as $animal) {
            echo $animal;
        }
    }
}
