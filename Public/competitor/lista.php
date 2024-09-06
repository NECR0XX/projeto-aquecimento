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
            <h2>Listar Competidores</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
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
                            <td><?php echo $competitor['height']; ?></td>
                            <td><?php echo $competitor['weight']; ?></td>
                            <td><?php echo $competitor['cpf']; ?></td>
                            <td><?php echo $competitor['rg']; ?></td>
                            <td><?php echo $competitor['team']; ?></td>
                            <td><a href='../../App/Providers/atualizarCompetitor.php?id=<?php echo $competitor['id']; ?>'><img src='../../Resources/Images/pen.png' alt='Editar' width='25' height='25'></a></td>
                            <td><a href='#' onclick="confirmDelete(<?php echo $competitor['id']; ?>)"><img src='../../Resources/Images/trash.png' alt='Deletar' width='25' height='25'></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>      
            <a href="../cadCompetidor.php" class="back-button">Voltar a página anterior</a>         
        </section>
        <section>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <p>Deseja excluir o item?</p>
                    <div class="op">
<<<<<<< HEAD
                        <button class="confirm" id="confirmDeleteBtn">Sim</button>
                        <button class="close" onclick="closeModal()">Cancelar</button>
                    </div>
=======
                    <button class="confirm" id="confirmDeleteBtn">Sim</button>
                    <button class="close" onclick="closeModal()">Não</button></div>
>>>>>>> e814b250915714194fdbafb851dc421044a765d5
                </div>
            </div>
        </section>
    </main>
    <script>
        function openModal() {
            document.getElementById("myModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        function confirmDelete(id) {
            openModal();
            document.getElementById("confirmDeleteBtn").onclick = function() {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../../App/Providers/deletarCompetitor.php?id=" + id, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText === "success") {
                            window.location.href = "lista.php";
                        } else {
                            alert("Falha ao excluir o competidor: " + xhr.responseText);
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