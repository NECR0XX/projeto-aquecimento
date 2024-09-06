<?php
require_once '../../DB/Config.php';
require_once '../../App/Controller/SportController.php';

$esporteController = new EsporteController($pdo);
$esportes = $esporteController->listarEsportes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/styledelete.css">
    <link rel="stylesheet" href="../../Resources/Css/lista.css">
    <title>Listar Esportes</title>
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
            <table border="1">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th colspan="2">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($esportes as $esporte): ?>
                        <tr>
                            <td><?php echo $esporte['name']; ?></td>
                            <td><?php echo $esporte['category']; ?></td>
                            <?php
                            echo "<td><a style='color:blue;' href='../../App/Providers/EditarSport.php?id={$esporte['id']}'><img src='../../Resources/Images/pen.png' alt='Deletar' width='25' height='25'></a></td>";
                            ?>
                            <td><a style='color:blue;' href='#' onclick="confirmDelete(<?php echo $esporte['id']; ?>)"><img src='../../Resources/Images/trash.png' alt='Deletar' width='25' height='25'></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>      
            <a href="../cadEsporte.php" class="back-button">Voltar a página anterior</a>        
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
                        xhr.open("POST", "../../App/Providers/ExcluirSport.php?id=" + id, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4) {
                                if (xhr.status == 200) {
                                    if (xhr.responseText == "success") {
                                        window.location.href = "ListarSports.php";
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