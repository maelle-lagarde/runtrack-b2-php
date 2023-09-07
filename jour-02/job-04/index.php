<?php

function find_all_students_grades() : array {
    $host = "localhost"; 
    $db_name = "lp_official"; 
    $username = "root"; 
    $password = "root"; 

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);

        $query = "SELECT s.email, s.fullname, g.name FROM student s JOIN grade g ON s.grade_id = g.id";
        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;

        return $data;
    } catch (PDOException $e) {
        die("Erreur de base de données : " . $e->getMessage());
    }
}

$studentData = find_all_students_grades();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des étudiants avec promotions</title>
</head>
<body>
    <h1>Liste des étudiants avec promotions</h1>
    <table border="1">
        <tr>
            <th>E-mail</th>
            <th>Nom complet</th>
            <th>ID grade</th>
        </tr>
        <?php foreach ($studentData as $data): ?>
            <tr>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['fullname']; ?></td>
                <td><?php echo $data['grade_id']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>