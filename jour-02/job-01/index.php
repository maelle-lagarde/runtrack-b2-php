<?php

function find_all_students() : array {

    $host = "localhost";
    $db_name = "lp_official";
    $username = "root"; 
    $password = "root";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);

        $query = "SELECT * FROM student";
        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;

        return $students;
    } catch (PDOException $e) {
        die("Erreur de base de données : " . $e->getMessage());
    }
}

$students = find_all_students();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des étudiants</title>
</head>
<body>
    <h1>Liste des étudiants</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Grade ID</th>
            <th>Email</th>
            <th>Nom complet</th>
            <th>Date de naissance</th>
            <th>Genre</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo $student['grade_id']; ?></td>
                <td><?php echo $student['email']; ?></td>
                <td><?php echo $student['fullname']; ?></td>
                <td><?php echo $student['birthdate']; ?></td>
                <td><?php echo $student['gender']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>