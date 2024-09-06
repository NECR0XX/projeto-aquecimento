<?php
require_once '../../DB/Config.php';
require_once '../../App/Controller/CompetitorController.php';

$competitorController = new competitorController($pdo);
$competitors = $competitorController->listarCompetitors();

if (isset($_POST['excluir_id'])) {
    $competitorController->deletarCompetitor($_POST['excluir_id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/styledelete.css">
    <title>Document</title>
</head>
<body>
    <header>
        <!-- COLOCAR OQ FOR NECESSARIO AQ -->
    </header>
    <main>
        <section>
            <h2>Listar Competidores</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Gênero</th>
                        <th>Altura</th>
                        <th>Peso</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Equipes</th>
                        <th colspan="2">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($competitors as $competitor): ?>
                        <tr>
                            <td><?php echo $competitor['name']; ?></td>
                            <td><?php echo $competitor['age']; ?></td>
                            <td><?php echo $competitor['gender']; ?></td>
                            <td><?php echo $competitor['height']; ?></td>
                            <td><?php echo $competitor['weight']; ?></td>
                            <td><?php echo $competitor['cpf']; ?></td>
                            <td><?php echo $competitor['rg']; ?></td>
                            <td><?php echo $competitor['team']; ?></td>
                            <?php
                            echo "<td><a style='color:blue;' href='../../App/Providers/atualizarCompetitor.php?id={$competitor['id']}'><img src='../../Resources/Images/pen.png' alt='Deletar' width='25' height='25'></a></td>";
                            ?>
                            <td><a style='color:blue;' href='#' onclick="confirmDelete(<?php echo $competitor['id']; ?>)"><img src='../../Resources/Images/trash.png' alt='Deletar' width='25' height='25'></a></td>
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
                        xhr.open("POST", "../../App/Providers/deletarCompetitor.php?id=" + id, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4) {
                                if (xhr.status == 200) {
                                    if (xhr.responseText == "success") {
                                        window.location.href = "lista.php";
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