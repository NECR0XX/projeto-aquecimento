<?php
require_once '../../DB/Config.php';
require_once '../../App/Controller/LocalityController.php';

$mensagem = "";

$localityController = new LocalityController($pdo);

if (isset($_POST['street']) && 
    isset($_POST['neighborhood']) &&
    isset($_POST['number']) &&
    isset($_POST['cep']) &&
    isset($_POST['city']) &&
    isset($_POST['state']) &&
    isset($_POST['country'])) 
{
    $localityController->criarLocality($_POST['street'], $_POST['neighborhood'], $_POST['number'], $_POST['cep'], $_POST['city'], $_POST['state'], $_POST['country']);
    $mensagem = 'Cadastro realizado com sucesso!';
    header('Location: #');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/stylecrud.css">
    <link rel="stylesheet" href="../../Resources/Css/msgcadastro.css">
    <link rel="stylesheet" href="../../Resources/Css/stylereg.css">
    <link rel="stylesheet" href="../../Resources/Css/paginainicial.css">
    <title>Gerenciamento de Localidades</title>
</head>
<body>
    <header>
    <div class="barra">
        <div class="cadastro">
            cadastro.com
        </div>
    </div>
    </header>
    <section>
            <div class="titulo">
                    cadastrar localidades
                </div>
            <main>
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
                    <span>Rua:</span><br>
                    <input type="text" name="street" required>
                </label><br>
                <label>
                    <span>Bairro:</span><br>
                    <input type="text" name="neighborhood" required>
                </label><br>
                <label>
                    <span>Número:</span><br>
                    <input type="number" name="number" min="0" required>
                </label><br>
                <label>
                    <span>CEP:</span><br>
                    <input type="number" name="cep" min="0" required>
                </label><br>
                <label>
                    <span>Cidade:</span><br>
                    <input type="text" name="city" required>
                </label><br>
                <label>
                    <span>Estado:</span><br>
                    <input type="text" name="state" required>
                </label><br>
                <label>
                    <span>País:</span><br>
                    <input type="text" name="country" required>
                </label><br><br>
                <button type="submit">Finalizar</button><br>
            <div class="paginaanterior">
                <a href="../cadLocalidade.php">Voltar à página anterior</a>
            </div>
            </form>
        </section>
    </main>
</body>
</html>
