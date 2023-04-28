<?php
namespace Utils;

class Parameters
{
    private static function animalParm($name, $type) {
        return [
            'name' => $name,
            'type' => $type
        ];
    }

    public static function examples() {
        global $argc, $argv;
        $scrptName = isset($argc) ? $argv[0] : "script.php";

        $example = "OOPAnimals \n\n".
            "Usage: php $scrptName [options] | <animal_name> <animal_type>\n".
            "Options:\n".
            "  -h, --help\t\tDisplay this help message\n".
            "  -n, --name\t\tAnimal name\n".
            "  -t, --type\t\tAnimal type\n".
            "Description\n".
            "  OOPAnimals requires a name and an animal type and respond with an appropriate message\n".
            "  It can takes name and type as possitional parameters or you can set it with options.\n".
            "Example:\n".
            " php $scrptName \"Mr Pickles\" cat\n".
            " php $scrptName -n\"Mr Pickles\" -tcat\n".
            " php $scrptName --name=\"Mr Pickles\" --type=cat\n";
        return $example;
    }
    
    public static function get(){
        global $argc, $argv;
        $animals = []; /** name and an animal type. */

        if (isset($argc)) {
            switch ($argc) {
                case 1:
                    //No parameter
                    break;
                case 2:
                    //Positional parameter name, animal type missing
                    break;
                case 3:
                    //Positional parameter name and animal type
                    break;
                        
                default:
                    # code...
                    break;
            }
//            if($argc  3){

            if($argc == 3){
                $animals[] = self::animalParm($argv[1], $argv[2]);
            } else {
                $shortopts = "h::";  // Animal Name
                $shortopts = "n::";  // Animal Name
                $shortopts .= "t::"; // Animal Type
                
                $longopts  = array(
                    "name::", //Animal Name
                    "type::" //Animal Type
                );
                $options = getopt($shortopts, $longopts);
        
                $animals["IS SET"] = true;
                //$i = 0 always bing the script name
                for ($i = 1; $i < $argc; $i++) {
                    $animals["Argument #" . $i] = $argv[$i];
                }
                //$val = getopt("p:");
                //$val = getopt(null, ["name:"]);
            }/*
            for ($i = 0; $i < $argc; $i++) {
                echo "Argument #" . $i . " - " . $argv[$i] . "\n";
            }*/
        }

        $animals['getopt'] = $options;

        return $animals;
    }

}

?>