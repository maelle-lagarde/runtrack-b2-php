<?php

function find_ordered_students() {
    $host = "localhost"; 
    $db_name = "lp_official";
    $username = "root";
    $password = "root";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);

        $query = "SELECT grade.name AS grade_name, student.fullname, student.birthdate, student.email
                  FROM grade
                  LEFT JOIN student ON grade.id = student.grade_id
                  ORDER BY grade_name, student.fullname";
        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $grades = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $gradeName = $row['grade_name'];
            unset($row['grade_name']);

            if (!isset($grades[$gradeName])) {
                $grades[$gradeName] = [];
            }

            $grades[$gradeName][] = $row;
        }

        $pdo = null;

        return $grades;
    } catch (PDOException $e) {
        die("Erreur de base de données : " . $e->getMessage());
    }
}

$grades = find_ordered_students();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des étudiants par promotion</title>
</head>
<body>
    <h1>Liste des étudiants par promotion</h1>
    <table border="1">
        <tr>
            <th>Promotion</th>
            <th>Nom complet</th>
            <th>Date de naissance</th>
            <th>E-mail</th>
        </tr>
        <?php foreach ($grades as $gradeName => $students): ?>
            <tr>
                <td rowspan="<?php echo count($students); ?>"><?php echo $gradeName; ?></td>
                <?php foreach ($students as $student): ?>
                    <td><?php echo $student['fullname']; ?></td>
                    <td><?php echo $student['birthdate']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </table>
    </body>
    </html>
