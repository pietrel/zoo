<?php

use PHPUnit\Framework\TestCase;
use Pietrel\Zoo\Animals;
use Pietrel\Zoo\Animals\Animal;
use Pietrel\Zoo\Zoo;

/**
 * @internal
 *
 * @coversNothing
 */
class ZooTest extends TestCase
{
    public static function tearDownAfterClass(): void
    {
        Zoo::resetInstance();
    }

    public function animals(): array
    {
        return [
            [new Animals\Tiger('Duke'), 1],
            [new Animals\Elephant('Dumbo'), 2],
            [new Animals\Rhino('Rocky'), 3],
            [new Animals\Fox('Ginger'), 4],
            [new Animals\SnowLeopard('Snowflake'), 5],
            [new Animals\Rabbit('Daisy'), 6],
        ];
    }

    /**
     * @dataProvider animals
     */
    public function testZooAddingAnimals(Animal $animal, int $count): void
    {
        $zoo = Zoo::getInstance();
        $zoo->addAnimal($animal);
        $this->assertCount($count, $zoo->getAnimals());
    }
}
