<?php
require_once '../DB/Config.php';
require_once '../App/Controller/SportController.php';

// ESPORTE
$esporteController = new EsporteController($pdo);

if (isset($_POST['name']) && 
    isset($_POST['category'])) 
{
    $esporteController->criarEsporte($_POST['name'], $_POST['category']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Esporte</title>
</head>
<body>
    <h1>Cadastrar Esporte</h1>
    <form method="post">
        <input type="text" name="name" placeholder="Nome" required>
        <input type="text" name="category" placeholder="Categoria" required>
        <button type="submit">Adicionar Esporte</button>
</form>
</body>
</html>