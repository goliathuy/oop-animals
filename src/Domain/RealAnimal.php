<?php
namespace Animals;

trait RealAnimal
{
    private $soundName = "";

    public function init($soundName)
    {
        $this->soundName = $soundName;
    }

    public function getSoundName()
    {
        return $this->soundName;
    }

    //Please provide implementation
    abstract public function getName();

    public function say()
    {
        return $this->getName() . " says \"" . $this->getSoundName .'"';
    }
}

?>