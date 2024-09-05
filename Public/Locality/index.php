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
    <header>

    </header>
    <main>
        <section>
            <h2>Listar Localidades</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Número</th>
                        <th>CEP</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>País</th>
                        <th colspan="2">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($localities as $locality): ?>
                        <tr>
                            <td><?php echo $locality['street']; ?></td>
                            <td><?php echo $locality['neighborhood']; ?></td>
                            <td><?php echo $locality['number']; ?></td>
                            <td><?php echo $locality['cep']; ?></td>
                            <td><?php echo $locality['city']; ?></td>
                            <td><?php echo $locality['state']; ?></td>
                            <td><?php echo $locality['country']; ?></td>
                            <?php
                            echo "<td><a style='color:blue;' href='../../App/Providers/atualizarLocality.php?id={$locality['id']}'><img src='../../Resources/Images/pen.png' alt='Deletar' width='25' height='25'></a></td>";
                            ?>
                            <td><a style='color:blue;' href='#' onclick="confirmDelete(<?php echo $locality['id']; ?>)"><img src='../../Resources/Images/trash.png' alt='Deletar' width='25' height='25'></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>      
            <a href="#">Voltar a página anterior</a>         
        </section>
        <section>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <p>Tem certeza que deseja excluir o item?</p>
                    <div class="op">
                    <button class="confirm" id="confirmDeleteBtn">Sim</button>
                    <button class="close" onclick="closeModal()">Cancelar</button></div>
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
            
                function confirmDelete(id) {
                    openModal();
                    document.getElementById("confirmDeleteBtn").onclick = function() {
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "../../App/Providers/deletarLocality.php?id=" + id, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4) {
                                if (xhr.status == 200) {
                                    if (xhr.responseText == "success") {
                                        window.location.href = "index.php";
                                    } else {
                                        alert("Falha ao excluir o treinador: " + xhr.responseText);
                                    }
                                }
                            }
                        };
                        xhr.send();
                    };
                }
            </script>
        </section>
    </main>
</body>
</html>
