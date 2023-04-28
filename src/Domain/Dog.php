<?php
namespace Animals;

class Dog extends Base
{
    private $mySound = "woof";
    private $myType = "dog";
    use RealAnimal;

    public function __construct($name)
    {
        parent::__construct($name, $this->myType);
        $this->init($this->mySound);
    }

    public function respond()
    {
        return $this->getType() . " (output: " . $this->say() . ")";
    }
}

?>