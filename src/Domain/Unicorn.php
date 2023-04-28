<?php
namespace Animals;

class Unicorn extends Base
{
    private $myType = "Unicorns";
    use UnrealAnimal;

    public function __construct($name)
    {
        parent::__construct($name, $this->myType);
    }

    public function respond()
    {
        return $this->tell();
    }
}

?>