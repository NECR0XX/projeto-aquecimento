<?php
include_once '../../DB/Config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        header('Location: ../../Public/Sport/ListarSports.php');
        exit;
    }
    
    $id = $_GET['id'];

    $name = $_POST['name'];
    $category = $_POST['category'];

    $stmt = $pdo->prepare('UPDATE sport SET name = ?, category = ? WHERE id = ?');
    $stmt->execute([$name, $category, $id]);
    header('Location: ../../Public/Sport/ListarSports.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: ../../Public/Sport/ListarSports.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM sport WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: ../../Public/Sport/ListarSports.php');
    exit;   
}
$name = $appointment['name'];
$category = $appointment['category'];

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
            Editar esporte
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
                <button type="submit">Atualizar</button><br>
                <div class="paginaanterior">
                <a href="#">Voltar a página anterior</a>
                </div>
            </form>
        </section>
    </main>

</body>
</html>