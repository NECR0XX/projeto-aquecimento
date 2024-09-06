<?php
require_once '../../DB/Config.php';
require_once '../../App/Controller/TrainerController.php';

$trainerController = new trainerController($pdo);
$trainers = $trainerController->listarTrainers();

if (isset($_POST['excluir_id'])) {
    $trainerController->excluirTrainer($_POST['excluir_id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/styledelete.css">
    
    <link rel="stylesheet" href="../../Resources/Css/listaG.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="barra">
            <div class="cadastro">
                cadastro.com
            </div>
        </div>
    </header>
    <main>
        <section>
            <h2>Listar Treinadores</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Altura</th>
                        <th>Peso</th>
                        <th>Cpf</th>
                        <th>RG</th>
                        <th colspan="2">Opções</th>
                    </tr>
                </thead>
                <?php foreach ($trainers as $trainer): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $trainer['id']; ?></td>
                            <td><?php echo $trainer['name']; ?></td>
                            <td><?php echo $trainer['age']; ?></td>
                            <td><?php echo $trainer['height']; ?></td>
                            <td><?php echo $trainer['weight']; ?></td>
                            <td><?php echo $trainer['cpf']; ?></td>
                            <td><?php echo $trainer['rg']; ?></td>
                            <?php
                            echo "<td><a style='color:blue;' href='../../App/Providers/atualizarTrainer.php?id={$trainer['id']}'><img src='../../Resources/Images/pen.png' alt='Deletar' width='25' height='25'></a></td>";
                            ?>
                            <td><a style='color:blue;' href='#' onclick="confirmDelete(<?php echo $trainer['id']; ?>)"><img src='../../Resources/Images/trash.png' alt='Deletar' width='25' height='25'></a></td>
                            </tr>
                            
                <?php endforeach; ?>
                <tbody>
            </table>
            <a href="../cadTreinadores.php" class="back-button">Voltar a página anterior</a>
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
                        xhr.open("POST", "../../App/Providers/deletarTrainer.php?id=" + id, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4) {
                                if (xhr.status == 200) {
                                    if (xhr.responseText == "success") {
                                        window.location.href = "listaTrainer.php";
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