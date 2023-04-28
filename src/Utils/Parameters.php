<?php
namespace Utils;

use InvalidArgumentException;
use UnexpectedValueException;
use LogicException;

class Parameters
{
    /**2DO: move form here */
    public static $programName = "OOPAnimals";

    public static function usageExample() {
        global $argc, $argv;
        $scrptName = isset($argc) ? $argv[0] : "script.php";

        $example = self::$programName . " \n\n".
            "Usage: php $scrptName [options] | <animal_name> <animal_type>\n".
            "Options:\n".
            "  -h, --help\t\tDisplay this help message\n".
            "  -n, --name\t\tAnimal name\n".
            "  -t, --type\t\tAnimal type\n".
            "Description\n".
            "  " . self::$programName . " requires a name and an animal type and respond with an appropriate message\n".
            "  It can takes name and type as possitional parameters or you can set it with options.\n".
            "Example:\n".
            " php $scrptName \"Mr Pickles\" cat\n".
            " php $scrptName -n\"Mr Pickles\" -tcat\n".
            " php $scrptName --name=\"Mr Pickles\" --type=cat\n";
        return $example;
    }

    public static function commandLineMessage() {
        return self::$programName . " is setup to work as a command line application";
    }

    private static function animalParm($name, $type) {
        return [
            'name' => $name,
            'type' => $type
        ];
    }

    private static function getOptions() {
        $shortopts = "n::";  // Animal Name
        $shortopts .= "t::"; // Animal Type
        $shortopts .= "h";  // Show Help
        
        $longopts  = [
            "name::", //Animal Name
            "type::", //Animal Type
            "help" //Show Help
        ];
        return getopt($shortopts, $longopts);
    }

    private static function pairAnimals($names, $types) {
        $animals = [];
        $namesArray = !is_array($names) ? [$names] : $names;
        $typesArray = !is_array($types) ? [$types] : $types;

        foreach ($namesArray as $key => $name) {
            if (isset($typesArray[$key])) {
                $animals[] = self::animalParm($name,$typesArray[$key]);
            } else {
                throw new UnexpectedValueException(self::usageExample(), 1);
            }
        }

        return $animals;
    }

    public static function get() {
        global $argc, $argv;
        $failed = false;
        $animals = []; /** name and an animal type. Or return empty*/

        //Check if i'm in command line
        if (isset($argc)) {

            $options = self::getOptions();

            if (isset($options['h']) || isset($options['help'])) {
                return false;
            } elseif ($argc < 3) {
                //Missing parameters
                throw new InvalidArgumentException(self::usageExample(), 1);
            }
            
            /* Short options */
            if (isset($options['n']) || isset($options['t'])) {
                if (isset($options['n']) && isset($options['t'])) {
                    $animals = self::pairAnimals($options['n'], $options['t']);
                } else {
                    $failed = true;
                }
            } else {
                /* Long options */
                if (isset($options['name']) || isset($options['type'])) {
                    if (isset($options['name']) || isset($options['type'])) {
                        $animals = self::pairAnimals($options['name'], $options['type']);
                    } else {
                        $failed = true;
                    }
                } else {
                    //Must recive name and type in that order.
                    //Any other parameter will be discarded
                    $animals[] = self::animalParm($argv[1], $argv[2]);
                }
            } 
        } else {
            throw new LogicException(self::commandLineMessage(), 1);
        }

        if ($failed) {
            //Parameters error
            throw new UnexpectedValueException(self::usageExample(), 1);
        }

        return $animals;
    }
}

?>