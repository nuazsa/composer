<?php

require_once __DIR__ . '/vendor/autoload.php';

use nuazsa\Data\Person;

$person = new Person("azis");

echo $person->getPerson("albert");
