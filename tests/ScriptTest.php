<?php
namespace TestCases;

use PHPUnit\Framework\TestCase;

class ScriptTest extends TestCase
{

    public function testHelpOption()
    {
        $output = shell_exec('php script.php --help');
        $this->assertContains("Usage: php script.php [options] | <animal_name> <animal_type>",$output);
        $this->assertContains("It can takes name and type as possitional parameters or you can set it with options",$output);
    }

    public function testPositionalParameters()
    {
        $AnimalName = "SomeAnimalName";
        $AnimalType = "Dog";
        $output = shell_exec("php script.php $AnimalName $AnimalType");

        $this->assertContains($AnimalName,$output);
        /**ignoring case for type */
        $this->assertContains(strtolower($AnimalType),strtolower($output));
    }

    public function testShortOptionsParameters()
    {
        $AnimalName = "AnimalShortOption";
        $AnimalType = "Cat";
        $output = shell_exec("php script.php -t$AnimalType -n$AnimalName");

        $this->assertContains($AnimalName,$output);
        /**ignoring case for type */
        $this->assertContains(strtolower($AnimalType),strtolower($output));
    }

    public function testMultipleShortOptionsParameters()
    {
        $Animal1Name = "AnimalShortOption1";
        $Animal1Type = "Cat";

        $Animal2Name = "AnimalShortOption2";
        $Animal2Type = "Cow";

        $NotExistingName = "IDoNotExist";
        $NotExisiingType = "SuperCow";

        $output = shell_exec("php script.php -n$Animal1Name -t$Animal1Type -t$Animal2Type -n$Animal2Name -t$NotExisiingType -n$NotExistingName");

        $this->assertContains($Animal1Name,$output);
        $this->assertContains($Animal2Name,$output);
        $this->assertNotContains($NotExistingName,$output);
        /**ignoring case for type */
        $this->assertContains(strtolower($Animal1Type),strtolower($output));
        $this->assertContains(strtolower($Animal2Type),strtolower($output));
        $this->assertContains(strtolower($NotExisiingType." NOT FOUND"),strtolower($output));

    }
}
