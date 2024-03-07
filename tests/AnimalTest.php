<?php

use PHPUnit\Framework\TestCase;
use Pietrel\Zoo\Animals;
use Pietrel\Zoo\Contracts\Carnivorous;
use Pietrel\Zoo\Contracts\HasFur;
use Pietrel\Zoo\Contracts\Herbivorous;
use Pietrel\Zoo\Contracts\Omnivorous;
use Pietrel\Zoo\Enums;
use Pietrel\Zoo\Errors\FeedingError;
use Pietrel\Zoo\Zoo;

/**
 * @internal
 *
 * @coversNothing
 */
class AnimalTest extends TestCase
{
    public static function tearDownAfterClass(): void
    {
        Zoo::resetInstance();
    }

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
        $zoo = Zoo::getInstance();
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
        if (is_a($animal, Herbivorous::class)) {
            $animal->feed(Enums\Food::Plants);
            $this->expectOutputString("Zwierzę je rośliny\n");
            $this->expectException(FeedingError::class);
            $animal->feed(Enums\Food::Meat);
        } elseif (is_a($animal, Carnivorous::class)) {
            $animal->feed(Enums\Food::Meat);
            $this->expectOutputString("Zwierzę je mięso\n");
            $this->expectException(FeedingError::class);
            $animal->feed(Enums\Food::Plants);
        } elseif (is_a($animal, Omnivorous::class)) {
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
    public function testFurMaintenance(Animals\Animal $animal)
    {
        if (is_a($animal, HasFur::class)) {
            $animal->combFur();
            $this->expectOutputString("Futro zwierzęcia zostało wyczesane\n");
            $this->assertTrue($animal->furCombed);
        } else {
            $this->expectNotToPerformAssertions();
        }
    }
}
