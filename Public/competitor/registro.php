<?php
require_once '../../DB/Config.php';
require_once '../../App/Controller/CompetitorController.php';

$mensagem = "";

$competitorController = new competitorController($pdo);
if (isset($_POST['name']) &&
    isset($_POST['age']) &&
    isset($_POST['gender']) &&
    isset($_POST['height']) &&
    isset($_POST['weight']) &&
    isset($_POST['cpf']) &&
    isset($_POST['rg']) &&
    isset($_POST['team'])) 
    {
        $competitorController->criarCompetitor($_POST['name'], $_POST['age'], $_POST['gender'], $_POST['height'], $_POST['weight'], $_POST['cpf'], $_POST['rg'], $_POST['team'],);
        $mensagem = 'Registro realizado com sucesso!';
    }
    $competitors = $competitorController->listarCompetitors();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <!-- COLOCAR OQ FOR NECESSARIO AQ -->
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
            <h2>Cadastrar Competidor</h2>
            <form method="post">
                <label>
                    <span>Nome:</span><br>
                    <input type="text" name="name" required>
                </label><br>
                <label>
                    <span>Idade:</span><br>
                    <input type="number" name="age" required>
                </label><br>
                <label>
                    <span>Gênero:</span><br>
                    <select name="gender">
                        <option value="">Selecione a opção</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                        <option value="Helicóptero Robinson R-44 Raven II">Helicóptero Robinson R-44 Raven II</option>
                    </select>
                </label><br>
                <label>
                    <span>Altura:</span><br>
                    <input type="number" name="height" required>
                </label><br>
                <label>
                    <span>Peso:</span><br>
                    <input type="number" name="weight" required>
                </label><br>
                <label>
                    <span>CPF:</span><br>
                    <input type="number" name="cpf" required>
                </label><br>
                <label>
                    <span>RG:</span><br>
                    <input type="number" name="rg" required>
                </label><br>
                <label>
                    <span>Equipe:</span><br>
                    <input type="text" name="team" required>
                </label><br><br>
                <button type="submit">Finalizar</button>
            </form>
        </section>
    </main>
</body>
</html>