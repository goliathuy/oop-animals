<?php
namespace TestCases;

use Animals\Dog;
use Animals\Unicorn;
use PHPUnit\Framework\TestCase;

class DogTest extends TestCase
{

    public function testClassConstructor()
    {
        $DogName = "TestPuppy";
        $DogType = "dog";

        $dog = new Dog($DogName);

        $this->assertSame($DogName, $dog->getName());
        $this->assertSame($DogType, $dog->getType());

        $NotADogName = "ImNotAPuppy";

        $notADog = new Unicorn($NotADogName);

        $this->assertSame($NotADogName, $notADog->getName());
        $this->assertNotEquals($DogType, $notADog->getType());
    }
    
}
