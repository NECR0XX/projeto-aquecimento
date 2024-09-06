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
<html>
<head>
    <title>Cadastrar Esporte</title>
</head>
<body>
    <header>

    </header>
    <main>
        <section>
            <h2>Cadastrar Esporte</h2>
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
                <a href="#">Voltar a página anterior</a>   
            </form>
        </section>
    </main>
</body>
</html>