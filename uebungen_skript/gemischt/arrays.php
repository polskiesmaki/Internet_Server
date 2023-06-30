<?php

class Student
{
    public $identity;
    public function __construct(string $identity_new)
    {
        $this->identity = $identity_new;
    }
}

$student1 = new Student("1");
$student2 = new Student("5");

$my_array = [$student1, $student2];

foreach ($my_array as $obj) {
    if ($obj->identity === "5") {
        var_dump($obj);
        break;
    }
}



?>