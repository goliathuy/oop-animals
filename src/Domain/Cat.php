<?php
namespace Animals;

class Cat extends Base
{
    use RealAnimal;

    private $mySound = "meow";
    private $myType = "cat"; //Could use get_class and strip the namespace

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