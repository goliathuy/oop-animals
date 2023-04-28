<?php
namespace Animals;

use UnexpectedValueException;

class Factory
{
    private static $inst = null;

    public static function getInstance() {
        if(is_null(self::$inst)) {
            self::$inst = new Factory();
        }
        return self::$inst;
    }

    private function __construct() {
        /** do not instantiate */
    }

    public function createAnimal($animal, $type = null) {
        if(is_array($animal) && isset($animal['name']) && isset($animal['type'])) {
            $name = $animal['name'];
            $type = $animal['type'];
        } elseif (is_string($animal) && is_string($type)) {
            $name = $animal;
            $type = $type;
        } else {
            throw new UnexpectedValueException("Please provide a name and type of animal", 1);            
        }

        return $this->realyCreateAnimal($name, $type);
    }

    private function realyCreateAnimal($name, $type) {
        $newAnimal = null;

        if(class_exists("Animals\\" . $type)) {
            $type = "Animals\\".ucfirst($type);
            $newAnimal = new $type($name);
        }

        return $newAnimal;
    }
}

?>