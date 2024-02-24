<?php

require_once __DIR__ . '/vendor/autoload.php';

// use nuazsa\Data\Person;

// $person = new Person("azis");
// $person->getPerson("albert");

use Nuazsa\LibraryTest\People;

$people = new People("azis");
echo $people->getName();
