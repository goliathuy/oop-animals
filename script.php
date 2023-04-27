<?php
$loader = require_once __DIR__ . '/vendor/autoload.php';

use Utils;

echo "Parameters get: ".Utils\Parameters::get();

/*if (isset($argc)) {
    echo "This is argc: ";
    var_dump($argc);
    echo "\nThis is argv: ";
    var_dump($argv);
}
else {
	echo "argc and argv disabled\n";
}*/