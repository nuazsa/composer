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