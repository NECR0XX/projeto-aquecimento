<?php
require_once '../../DB/Config.php';
require_once '../Controller/TrainerController.php';

$controller = new TrainerController($pdo); // Substitua $pdo pela sua conexão PDO

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios estão preenchidos
    if (!empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['height']) && !empty($_POST['weight']) && !empty($_POST['cpf']) && !empty($_POST['rg'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAINER</title>
</head>
<body>
    <form method="post">

    <label for="name">Nome:</label>
        <input type="text" name="name" required><br>

        <label for="age">Idade:</label>
        <input type="number" name="age"><br>

        <label for="height">Altura:</label>
        <input type="number" name="height"><br>

        <label for="weight">Peso:</label>
        <input type="number" name="weight"><br>

        <label for="cpf">CPF:</label>
        <input type="number" name="cpf"><br>

        <label for="rg">RG:</label>
        <input type="number" name="rg"><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>