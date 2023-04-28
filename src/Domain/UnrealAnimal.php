<?php
namespace Animals;

trait UnrealAnimal
{
    //Please provide implementation
    abstract public function getType();

    public function tell()
    {
        return $this->gettype() . " are not real";
    }
}

?>