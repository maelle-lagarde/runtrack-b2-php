<?php

function find_full_rooms() {
    $host = "localhost"; 
    $db_name = "lp_official"; 
    $username = "root";
    $password = "root";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);

        $query = "SELECT r.name, r.capacity, COUNT(s.id) AS students_count
                  FROM room
                  LEFT JOIN student ON r.id = s.r_id
                  GROUP BY r.id, r.name, r.capacity";
        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rooms as &$room) {
            $room['is_full'] = ($room['students_count'] >= $room['capacity']) ? 'Oui' : 'Non';
        }

        $pdo = null;

        return $rooms;
    } catch (PDOException $e) {
        die("Erreur de base de données : " . $e->getMessage());
    }
}

$rooms = find_full_rooms();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des salles</title>
</head>
<body>
    <h1>Liste des salles</h1>
    <table border="1">
        <tr>
            <th>Nom de la salle</th>
            <th>Capacité</th>
            <th>Salle pleine</th>
        </tr>
        <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?php echo $room['name']; ?></td>
                <td><?php echo $room['capacity']; ?></td>
                <td><?php echo $room['is_full']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>