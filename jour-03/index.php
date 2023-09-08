<?php

require_once('class/Student.php');
require_once('class/Grade.php');
require_once('class/Room.php');
require_once('class/Floor.php');
require_once('class/functions.php');

$studentId = 5;
$student = findOneStudent($studentId);

var_dump($student);

?>