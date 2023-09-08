<?php

require_once('class/Student.php');
require_once('class/Grade.php');
require_once('class/Floor.php');
require_once('class/Room.php');
require_once('class/Database.php');

function findOneStudent(int $id): Student
{
    $student = new Student(
        $studentData['id'],
        $studentData['grade_id'],
        $studentData['email'],
        $studentData['fullname'],
        new DateTime($studentData['birthdate']),
        $studentData['gender']
    )
   
}

function findOneGrade(int $id): ?Grade
{
   
}

function findOneFloor(int $id): ?Floor
{
    
}

function findOneRoom(int $id): ?Room
{
    
}

?>