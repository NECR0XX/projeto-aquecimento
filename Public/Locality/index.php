<?php
session_start();
require_once '../../DB/Config.php';
require_once '../../App/Controller/LocalityController.php';
$localityController = new LocalityController($pdo);
$localities = $localityController->listarLocalitys();

if (isset($_POST['excluir_id_locality'])) {
    $localityController->excluirLocality($_POST['excluir_id_locality']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/stylepg.css">
    <link rel="stylesheet" href="../../Resources/Css/styledelete.css">
    <link rel="stylesheet" href="../../Resources/Css/ambientes.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    <title>SCAR - Listagem de Localidades</title>
</head>

<body>

    <div class="content-wrapper">
        <div class="content">
            <a class="a3" href="../pg.php">«</a>

            <h1>LOCALIDADES</h1>


            <ul class="list">
                <?php foreach ($localities as $locality): ?>
                    <li><strong>ID:</strong> <?php echo $locality['id']; ?>
                        - <strong>Rua:</strong> <?php echo $locality['street']; ?>
                        - <strong>Bairro:</strong> <?php echo $locality['neighborhood']; ?>
                        - <strong>Número:</strong> <?php echo $locality['number']; ?>
                        - <strong>CEP:</strong> <?php echo $locality['cep']; ?>
                        - <strong>Cidade:</strong> <?php echo $locality['city']; ?>
                        - <strong>Estado:</strong> <?php echo $locality['state']; ?>
                        - <strong>País:</strong> <?php echo $locality['country']; ?>
                        
                        <?php
                            echo "<a class='a1' href='../../App/Providers/atualizarlocality.php?id={$locality['id']}'>editar</a> ";
                            echo " ou ";
                            echo "<a class='a2' href='#' onclick='confirmDelete({$locality['id']})'>excluir</a>";
                        
                        ?>

                        <hr>
                    </li>
                <?php endforeach; ?>
            </ul>
            <br>

        </div>
    </div>
    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <p>Tem certeza que deseja excluir o item?</p>
            <div class="op">
                <button class="confirm" id="confirmDeleteBtn">Sim</button>
                <button class="close" onclick="closeModal()">Cancelar</button>
            </div>
        </div>
    </div>
    
</body>

</html>
