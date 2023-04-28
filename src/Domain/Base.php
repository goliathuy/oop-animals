<?php
namespace Animals;

abstract class Base
{
    private $name;
    private $type;

    function __construct($name, $type) {
        $this->name = $name;
        $this->type = $type;
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