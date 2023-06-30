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


$arr = ["Claus" => $student1, "Peter" => $student2];
$arr_new = [];
foreach ($arr as $key => $value) {
    $arr_new[] = $key;
}

print_r($arr_new);


?>