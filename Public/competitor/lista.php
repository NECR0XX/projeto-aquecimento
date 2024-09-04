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
    <title>Document</title>
</head>
<body>
    <header>
        <!-- COLOCAR OQ FOR NECESSARIO AQ -->
    </header>
    <main>
        <section>
            <h2>Listar Competidors</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Gênero</th>
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
                            <td><?php echo $competitor['age']; ?></td>
                            <td><?php echo $competitor['gender']; ?></td>
                            <td><?php echo $competitor['height']; ?></td>
                            <td><?php echo $competitor['weight']; ?></td>
                            <td><?php echo $competitor['cpf']; ?></td>
                            <td><?php echo $competitor['rg']; ?></td>
                            <td><?php echo $competitor['team']; ?></td>
                            <td><?php echo '<a href="../../App/Providers/atualizarCompetitor.php?id= . $competitor['id'] . "'><img src="" alt=""></a></td>
                            <td><?php echo <a href=""><img src="" alt=""></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>      
            <a href="#">Voltar a página anterior</a>         
        </section>
    </main>
</body>
</html>