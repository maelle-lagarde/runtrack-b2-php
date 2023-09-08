<?php

require_once 'class/Student.php';
require_once 'class/Grade.php';
require_once 'class/Room.php';
require_once 'class/Floor.php';

function findOneStudent(int $id): Student
{
    $bdd = "mysql:host=localhost;dbname=lp_official";
    $username = "root";
    $password = "root";

    $pdo = new PDO($bdd, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM student WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $studentData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $student = new Student(
        $studentData['id'],
        $studentData['grade_id'],
        $studentData['email'],
        $studentData['fullname'],
        new DateTime($studentData['birthdate']),
        $studentData['gender']);
        
        return $student;
    }
        
function findOneGrade(int $id): Grade
{
    $bdd = "mysql:host=localhost;dbname=lp_official";
    $username = "root";
    $password = "root";
            
    $pdo = new PDO($bdd, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM grade WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $gradeData = $stmt->fetch(PDO::FETCH_ASSOC);
            
    $grade = new Grade(
        $gradeData['id'],
        $gradeData['room_id'],
        $gradeData['name'],
        new DateTime($gradeData['year']),
        );
                
    return $grade;
}

function findOneFloor(int $id): Floor
{
    $bdd = "mysql:host=localhost;dbname=lp_official";
    $username = "root";
    $password = "root!";

    $pdo = new PDO($bdd, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM floor WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $floorData = $stmt->fetch(PDO::FETCH_ASSOC);

    $floor = new Floor(
        $floorData['id'],
        $floorData['name'],
        $floorData['level'],
    );

    return $floor;
}

function findOneRoom(int $id): Room
{
    $bdd = "mysql:host=localhost;dbname=lp_official";
    $username = "root";
    $password = "root!";

    $pdo = new PDO($bdd, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM room WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $roomData = $stmt->fetch(PDO::FETCH_ASSOC);

    $room = new Room(
        $roomData['id'],
        $roomData['floor_id'],
        $roomData['name'],
        $roomData['capacity'],
    );

    return $room;
}
?>