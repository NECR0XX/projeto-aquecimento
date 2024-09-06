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
<<<<<<< HEAD
=======
    <link rel="stylesheet" href="../../Resources/Css/paginainicial.css">
>>>>>>> fd22ad0296a07ac2f9b72dfe3592cf82db648453
</head>
<body>
    <header>
<<<<<<< HEAD

    </header>
    <main>
        <section>
            <h2>Cadastrar Esporte</h2>
=======
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
>>>>>>> fd22ad0296a07ac2f9b72dfe3592cf82db648453
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
<<<<<<< HEAD
=======

>>>>>>> fd22ad0296a07ac2f9b72dfe3592cf82db648453
</body>
</html>