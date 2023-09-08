<?php

require_once('class/Student.php');
require_once('class/Grade.php');
require_once('class/Room.php');
require_once('class/Floor.php');
require_once('class/functions.php');

$studentId = 5;
$student = findOneStudent($studentId);

var_dump($student);

$gradeId = 2;
$grade = findOneGrade($gradeId);

var_dump($grade);

$floorId = 1;
$floor = findOneGrade($floorId);

$roomId = 4;
$room = findOneRoom($roomId);

?>