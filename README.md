# HOW TO USING COMPOSER 
Composer is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you.

- [Installation](#installation---windows)
- [Configuration](#configuration)
- [Autoload](#autoload)
- [Traying](#trayig)
  * [Simple](#simple-traying)
  * [With Dependency](#traying-with-external-dependecy)


## Installation - Windows
https://getcomposer.org/Composer-Setup.exe

## Configuration
Initialize Composer -> `composer init` \
Install Dependency -> `composer update` or `composer install`

- composer update : `composer.json -> composer.lock
- composer install : composer.lock -> composer.json

Restart Autoloader -> `composer dump-autoload`

## Autoload 

put this in `composer.json` file
``` json
{
    "autoload": {
        "psr-4": {"nuazsa\\": "src/"}
    }
}
```
This configuration tells Composer to autoload classes with the nuazsa\ namespace from the src/ directory.

- Before:
``` php
require 'src/Class1.php';
require 'src/Class2.php';
...
```

- After:
``` php
require __DIR__ . 'vendor/autoload.php';
```

Don't forger to Restart Autoloader


## Trying

### Simple Traying
Create -> src/Data/Person.php

``` php 
<?php

namespace nuazsa\Data;

class Person 
{

    public function __construct(private string $name) 
    {
    }

    public function getPerson(string $name)
    {
        echo "Hello $name, how are you?. I'm $this->name";
    }
}
```

***`Restart Autoloader`***

Create -> index.php
```  php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use nuazsa\Data\Person;

$person = new Person("azis");
$person->getPerson("albert");
```

output -> powershell
``` powershell
Hello Albert, how are you? I'm Azis.
```

### Traying With External Dependecy
Added -> composer.json
``` json 
{
    "require": {
        "monolog/monolog": "2.0.*"
    }
}
```

Create -> useDependency.php || Update -> index.php
``` php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('nuazsa');
$log->pushHandler(new StreamHandler('application.log', Logger::INFO));

$log->info("Hello World");
$log->info("The frist using composer");
```

Execute -> Powershell
``` powershell
php useDependency.php
```

Output -> application.log
``` log
[2024-02-20T10:02:48.062563+00:00] nuazsa.INFO: Hello World [] []
[2024-02-20T10:02:48.071377+00:00] nuazsa.INFO: The frist using composer [] []
```