<?php
require_once '../../DB/Config.php';
require_once '../../App/Controller/TrainerController.php';

$trainerController = new TrainerController($pdo); // Substitua $pdo pela sua conexão PDO

if (isset($_POST['name']) && 
    isset($_POST['age']) &&
    isset($_POST['height']) &&
    isset($_POST['weight']) &&
    isset($_POST['cpf']) &&
    isset($_POST['rg'])) 
{
    $trainerController->criarCadastroTrainer($_POST['name'], $_POST['age'], $_POST['height'], $_POST['weight'], $_POST['cpf'], $_POST['rg']);
    
}
$trainers = $trainerController->listarTrainers();
?>
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
        <input type="text" name="name" placeholder="Nome" required><br>

        <label for="age">Idade:</label>
        <input type="number" name="age" placeholder="Idade" required><br>

        <label for="height">Altura:</label>
        <input type="number" name="height" placeholder="Altura" required><br>

        <label for="weight">Peso:</label>
        <input type="number" name="weight" placeholder="Peso" required><br>

        <label for="cpf">CPF:</label>
        <input type="number" name="cpf" placeholder="CPF" required><br>

        <label for="rg">RG:</label>
        <input type="number" name="rg" placeholder="RG" required><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>