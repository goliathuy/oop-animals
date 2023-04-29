<?php
$loader = require_once __DIR__ . '/vendor/autoload.php';

use Utils\Parameters;
use Animals\Factory;

try {
    $parameters = Parameters::get();

    //No animals show help
    if($parameters === false) {
        echo Parameters::usageExample();
        exit(0);
    }

    $factory = Factory::getInstance();

    foreach ($parameters as $key => $animal) {
        if($oneAnimal = $factory->createAnimal($animal)) {
            $response = $oneAnimal->respond();
        } else {
            $response = "NOT FOUND";
        };
        echo $animal['type'] . " (output: " . $response . ")\n";
    }
} catch (LogicException $l) {
    /** Throwing and catching different types of exceptions separately allow options for handling different errors */
    echo $l->getMessage();
    exit($l->getCode());
} catch (InvalidArgumentException $i) {
    echo $i->getMessage();
    exit($i->getCode());
} catch (UnexpectedValueException $u) {
    echo $u->getMessage();
    exit($u->getCode());
} catch (\Throwable $th) {
    echo "Unexpected error: " . $th->getMessage();
    exit(1);
}

