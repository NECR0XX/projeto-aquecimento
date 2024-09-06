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
</head>
<body>
    <header>

    </header>
    <main>
        <section>
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
        </section>
        <section>
            <h2>Cadastrar Treinador</h2>
                <form method="post">

                <label for="name">Nome:</label><br>
                    <input type="text" name="name" required><br>

                    <label for="age">Idade:</label><br>
                    <input type="number" name="age" required><br>

                    <label for="height">Altura:</label><br>
                    <input type="number" name="height" required><br>

                    <label for="weight">Peso:</label><br>
                    <input type="number" name="weight" required><br>

                    <label for="cpf">CPF:</label><br>
                    <input type="number" name="cpf" required><br>

                    <label for="rg">RG:</label><br>
                    <input type="number" name="rg" required><br><br>

                    <input type="submit" value="Finalizar"><br>
                    <a href="#">Voltar a página anterior</a>   
                </form>
        </section>
    </main>
</body>
</html>