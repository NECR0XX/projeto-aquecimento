<?php
require_once '../DB/Config.php';
require_once '../App/Controller/SportController.php';

// ESPORTE
$esporteController = new EsporteController($pdo);
$esportes = $esporteController->listarEsportes();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Esportes</title>
</head>
<body>
    <fieldset>
        <legend><h2>Lista de Esportes</h2></legend>
        <ul class="list3">
        <?php foreach ($esportes as $esporte): ?>
            <li><strong>ID:</strong> <?php echo $esporte['id']; ?>
            <strong>Nome:</strong> <?php echo $esporte['name']; ?>
                - <strong>Categoria:</strong> <?php echo $esporte['category']; ?>
                <?php echo "<a href='EditarSport.php?id={$esporte['id']}'>editar</a>" ?>
                ou <a href="ExcluirSport.php">excluir</a>
                <hr>
            </li>
        <?php endforeach; ?>
    </ul>
    </fieldset>
</body>
</html>