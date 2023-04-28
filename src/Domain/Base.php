<?php
namespace Animals;

abstract class Base
{
    private $name;
    private $type;

    function __construct($name, $type) {
        $this->name = $name;
        $this->type = $type;
        print "In BaseClass constructor\n";
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public abstract function respond();
}

?>