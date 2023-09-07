<?php

function find_one_student(string $email) : array  {
    
    $host = "localhost";
    $db_name = "lp_official";
    $username = "root"; 
    $password = "root";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);

        $query = "SELECT * FROM student WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $stmt->execute();

        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdo = null;

        return $student;
    } catch (PDOException $e) {
        die("Erreur de base de données : " . $e->getMessage());
    }
}

if (isset($_GET['input-email-student'])) {
    $email = $_GET['input-email-student'];

    $student = find_one_student($email);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Rechercher un étudiant</title>
</head>
<body>
    <h1>Rechercher un étudiant par e-mail</h1>
    <form method="get" action="">
        <label for="input-email-student">E-mail de l'étudiant :</label>
        <input type="text" name="input-email-student" id="input-email-student">
        <button type="submit">Rechercher</button>
    </form>
    
    <?php if (isset($student)): ?>
        <h2>Informations de l'étudiant :</h2>
        <pre>
            <?php print_r($student); ?>
        </pre>
    <?php endif; ?>
</body>
</html>