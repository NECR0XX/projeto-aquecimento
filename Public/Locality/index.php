<?php
session_start();
require_once '../../Config/config.php';
require_once '../../App/Controller/LocalityController.php';

$localityController = new LocalityController($pdo);
$localitys = $localityController->listarLocalitys();

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

        <h1>Localidade</h1>
        <ul class="list3">
            <?php foreach ($localitys as $locality): ?>
                <li><strong>Id Localidade:</strong> <?php echo $locality['id']; ?> 
                - <strong>Street:</strong> <?php echo $locality['street']; ?> 
                - <strong>Neighborhood:</strong> <?php echo $locality['neighborhood']; ?> 
                - <strong>Number:</strong> <?php echo $locality['number']; ?> 
                - <strong>CEP:</strong> <?php echo $locality['cep']; ?> 
                - <strong>City:</strong> <?php echo $locality['city']; ?> 
                - <strong>State:</strong> <?php echo $locality['state']; ?> 
                - <strong>Country:</strong> <?php echo $locality['country']; ?>
                
                <?php
                if ($_SESSION['usuarioNiveisAcessoId'] != 5) {
                    echo "<a class='a1' href='../../App/Providers/atualizarlocality.php?id={$locality['id']}'>editar</a>";
                    echo " ou <a class='a2' href='#' onclick='confirmDelete({$locality['id']})'>excluir</a><hr></li>";
                }
                ?>
            <?php endforeach; ?>
        </ul>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <p>Tem certeza que deseja excluir o item?</p>
                <div class="op">
                    <button class="confirm" id="confirmDeleteBtn">Sim</button>
                    <button class="close" onclick="closeModal()">Cancelar</button>
                </div>
            </div>
        </div>

        <script>
            function openModal() {
                var modal = document.getElementById("myModal");
                modal.style.display = "block";
            }

            function closeModal() {
                var modal = document.getElementById("myModal");
                modal.style.display = "none";
            }

            function confirmDelete(id_locality) {
                openModal();
                document.getElementById("confirmDeleteBtn").onclick = function() {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "../../App/Providers/deletarlocality.php?id_locality=" + id_locality, true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                if (xhr.responseText == "success") {
                                    window.location.href = "index.php";
                                } else {
                                    alert("Falha ao excluir a localidade: " + xhr.responseText);
                                }
                            }
                        }
                    };
                    xhr.send();
                };
            }
        </script>

    </div>
</div>
</body>
</html>
