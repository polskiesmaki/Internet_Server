<?php
$modulpath = __DIR__ . DIRECTORY_SEPARATOR . 'Modul.php';
$lecutrepath = __DIR__ . DIRECTORY_SEPARATOR . 'Lecture.php';
require_once $modulpath;
require_once $lecutrepath;


$buch = new Lecture("Vorlesung Internetprogrammierung");

echo $buch->getLecture();

echo $buch->getLectureWithTeacher();

?>