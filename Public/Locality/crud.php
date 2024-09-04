<?php
require_once '../../DB/Config.php';
require_once '../../App/Controller/LocalityController.php';

$mensagem = "";

$localityController = new LocalityController($pdo);

if (isset($_POST['street']) && 
    isset($_POST['neighborhood']) &&
    isset($_POST['number']) &&
    isset($_POST['cep']) &&
    isset($_POST['city']) &&
    isset($_POST['state']) &&
    isset($_POST['country'])) 
{
    $localityController->criarLocality($_POST['street'], $_POST['neighborhood'], $_POST['number'], $_POST['cep'], $_POST['city'], $_POST['state'], $_POST['country']);
    $mensagem = 'Cadastro realizado com sucesso!';
}
$localitys = $localityController->listarLocalitys();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/stylecrud.css">
    <link rel="stylesheet" href="../../Resources/Css/msgcadastro.css">
    <link rel="stylesheet" href="../../Resources/Css/stylereg.css">
    <title>Gerenciamento de Localidades</title>
</head>
<body>
<div class="content-wrapper">
    <div class="content">
        <a class="a3" href="index.php">«</a>

    <?php if ($mensagem): ?>
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="document.getElementById('modal').style.display='none'">&times;</span>
                <p><?= $mensagem ?></p>
            </div>
        </div>
        <script>
            document.getElementById('modal').style.display = 'block';
        </script>
    <?php endif; ?>

    <h2>Controle de Locality</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="street" placeholder="Street" required>
        <input type="text" name="neighborhood" placeholder="Neighborhood" required>
        <input type="text" name="number" placeholder="Number" required>
        <input type="text" name="cep" placeholder="CEP" required>
        <input type="text" name="city" placeholder="City" required>
        <input type="text" name="state" placeholder="State" required>
        <input type="text" name="country" placeholder="Country" required>
        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
