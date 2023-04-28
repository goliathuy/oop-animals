<?php
namespace Animals;

class Cow extends Base
{
    use RealAnimal;

    private $mySound = "moo";
    private $myType = "cow"; //Could use get_class and strip the namespace

    public function __construct($name)
    {
        parent::__construct($name, $this->myType);
        $this->init($this->mySound);
    }

    public function respond()
    {
        return $this->say();
    }
}

?>