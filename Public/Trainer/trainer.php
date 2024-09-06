<?php
require_once '../../DB/Config.php';
require_once '../../App/Controller/TrainerController.php';

$mensagem = "";

$trainerController = new TrainerController($pdo);

if (isset($_POST['name']) && 
    isset($_POST['age']) &&
    isset($_POST['height']) &&
    isset($_POST['weight']) &&
    isset($_POST['cpf']) &&
    isset($_POST['rg'])) 
{
    $trainerController->criarCadastroTrainer($_POST['name'], $_POST['age'], $_POST['height'], $_POST['weight'], $_POST['cpf'], $_POST['rg']);
    $mensagem = 'Registro realizado com sucesso!';
    header('Location: #');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAINER</title>
    <link rel="stylesheet" href="../../Resources/Css/paginainicial.css">
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
        <div class="titulo">
                cadastrar treinador
            </div>
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
        <form method="post">
            <label>
                <span>Nome:</span><br>
                <input type="text" name="name" required>
            </label><br>

            <label>
                <span>Idade:</span><br>
                <input type="number" name="age" min="0" required>
            </label><br>

            <div class="row">
                <label>
                    <span>Altura:</span><br>
                    <input type="number" name="height" min="0" required>
                </label>
                <label>
                    <span>Peso:</span><br>
                    <input type="number" name="weight" min="0" required>
                </label>
            </div><br>

            <label>
                <span>CPF:</span><br>
                <input type="number" name="cpf" min="0" required>
            </label><br>

            <label>
                <span>RG:</span><br>
                <input type="number" name="rg" min="0" required>
            </label><br><br>

            <button type="submit">Finalizar</button><br>
            <div class="paginaanterior">
                <a href="../cadTreinadores.php">Voltar à página anterior</a>
            </div>
        </form>
    </section>
</main>
</body>
</html>