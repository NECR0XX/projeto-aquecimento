<?php
require_once '../../DB/Config.php';
require_once '../../App/Controller/SportController.php';

$mensagem = "";

$esporteController = new EsporteController($pdo);
if (isset($_POST['name']) && 
    isset($_POST['category'])) 
{
    $esporteController->criarEsporte($_POST['name'], $_POST['category']);
    $mensagem = 'Registro realizado com sucesso!';
    header('Location: #');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Esporte</title>
    <link rel="stylesheet" href="../../Resources/Css/paginainicial.css">
</head>
<body>
    <header>
    </header>
    <div class="barra">
        <div class="cadastro">
            cadastro.com
        </div>
    </div>
    <div class="titulo">
            cadastrar esporte
        </div>

        <main>
        <section>
            <form method="post">
                <label>
                    <span>Nome:</span><br>
                    <input type="text" name="name" required>
                </label><br>
                <label>
                    <span>Categoria:</span><br>
                    <input type="text" name="category" required>
                </label><br><br>
                <button type="submit">Finalizar</button><br>
                <div class="paginaanterior">
                <a href="#">Voltar a página anterior</a>
                </div>
            </form>
        </section>
    </main>

</body>
</html>