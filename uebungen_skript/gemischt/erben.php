<?php
class OKlasse
{
    public function __construct(string $s)
    {

    }
}

class UKlasse extends OKlasse
{
    public function __construct(string $s)
    {
        parent::__construct($s);
    }
}