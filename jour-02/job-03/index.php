<?php

function insert_student(string $email, string $fullname, string $gender, DateTime $birthdate, int $gradeId) : array {
    $host = "localhost"; 
    $db_name = "lp_official"; 
    $username = "root";
    $password = "root"; 

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);

        $query = "INSERT INTO student (email, fullname, gender, birthdate, grade_id) VALUES (:email, :fullname, :gender, :birthdate, :grade_id)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindParam(':birthdate', $birthdate->format('Y-m-d'), PDO::PARAM_STR); // Formatage de la date au format MySQL
        $stmt->bindParam(':grade_id', $gradeId, PDO::PARAM_INT);

        $stmt->execute();

        $studentId = $pdo->lastInsertId();

        $pdo = null;

        return ['student_id' => $studentId];
    } catch (PDOException $e) {
        die("Erreur de base de données : " . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['input-email'];
    $fullname = $_POST['input-fullname'];
    $gender = $_POST['input-gender'];
    $birthdate = new DateTime($_POST['input-birthdate']);
    $gradeId = intval($_POST['input-grade_id']);

    $result = insert_student($email, $fullname, $gender, $birthdate, $gradeId);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insérer un nouvel étudiant</title>
</head>
<body>
    <h1>Insérer un nouvel étudiant</h1>
    
    <?php if (isset($result)): ?>
        <p>L'étudiant a été inséré avec succès. ID de l'étudiant inséré : <?php echo $result['student_id']; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="input-email">E-mail :</label>
        <input type="email" name="input-email" id="input-email" required><br>
        
        <label for="input-fullname">Nom complet :</label>
        <input type="text" name="input-fullname" id="input-fullname" required><br>

        <label for="input-gender">Genre :</label>
        <select name="input-gender" id="input-gender">
            <option value="male">Homme</option>
            <option value="female">Femme</option>
        </select><br>

        <label for="input-birthdate">Date de naissance :</label>
        <input type="date" name="input-birthdate" id="input-birthdate" required><br>

        <label for="input-grade_id">ID de la classe :</label>
        <input type="number" name="input-grade_id" id="input-grade_id" required><br>

        <button type="submit">Insérer</button>
    </form>
</body>
</html>