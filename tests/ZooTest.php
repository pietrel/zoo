<?php

use PHPUnit\Framework\TestCase;
use Pietrel\Zoo\Animals;
use Pietrel\Zoo\Enums;

class ZooTest extends TestCase
{
    public function testAnimalName()
    {
        $animal = new Animals\Tiger('Duke');
        $this->assertEquals("Tygrys Duke\n", $animal);
    }

    public function animals(): array
    {
        return [
            [new Animals\Tiger('Duke')],
            [new Animals\Elephant('Dumbo')],
            [new Animals\Rhino('Rocky')],
            [new Animals\Fox('Ginger')],
            [new Animals\SnowLeopard('Snowflake')],
            [new Animals\Rabbit('Daisy')],
        ];
    }

    public function testAddingAnimals()
    {
        $zoo = new Pietrel\Zoo\Zoo();
        $zoo->addAnimal(new Animals\Tiger('Duke'));
        $zoo->addAnimal(new Animals\Elephant('Dumbo'));
        $zoo->addAnimal(new Animals\Rhino('Rocky'));
        $zoo->addAnimal(new Animals\Fox('Ginger'));
        $zoo->addAnimal(new Animals\Rabbit('Daisy'));
       $this->expectOutputString("Tygrys Duke\nSłoń Dumbo\nNosorożec Rocky\nLis Ginger\nKrólik Daisy\n");
        $zoo->showAnimals();
    }

    /**
     * @dataProvider animals
     */
    public function testFeeding(Animals\Animal $animal)
    {
        if (is_a($animal, Pietrel\Zoo\Contracts\Herbivorous::class)) {
            $animal->feed(Enums\Food::Plants);
            $this->expectOutputString("Zwierzę je rośliny\n");
            $this->expectException(Pietrel\Zoo\Errors\FeedingError::class);
            $animal->feed(Enums\Food::Meat);
        } elseif (is_a($animal, Pietrel\Zoo\Contracts\Carnivorous::class)) {
            $animal->feed(Enums\Food::Meat);
            $this->expectOutputString("Zwierzę je mięso\n");
            $this->expectException(Pietrel\Zoo\Errors\FeedingError::class);
            $animal->feed(Enums\Food::Plants);
        } elseif (is_a($animal, Pietrel\Zoo\Contracts\Omnivorous::class)) {
            $animal->feed(Enums\Food::Plants);
            $this->expectOutputString("Zwierzę je rośliny\n");
            $animal->feed(Enums\Food::Meat);
            $this->expectOutputString("Zwierzę je mięso\n");
        } else {
            $this->addWarning('Nieprawidłowa implementacja interfejsu żywienia dla zwierzęcia');
        }
    }

    /**
     * @dataProvider animals
     */
    public function testFurMaintenance(Animals\Animal $animal){
        if (is_a($animal, Pietrel\Zoo\Contracts\HasFur::class)) {
            $animal->combFur();
            $this->expectOutputString("Futro zwierzęcia zostało wyczesane\n");
            $this->assertTrue($animal->furCombed);
        } else {
            $this->expectNotToPerformAssertions();
        }
    }
}