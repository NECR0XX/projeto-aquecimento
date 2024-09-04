<!DOCTYPE html>
<html>
<head>
    <title>LISTA TREINADORES</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Treinadores</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Altura</th>
                        <th>Peso</th>
                        <th>Cpf</th>
                        <th>RG</th>
                    </tr>
                </thead>
                <?php foreach ($trainers as $trainer): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $trainer['id']; ?></td>
                            <td><?php echo $trainer['name']; ?></td>
                            <td><?php echo $trainer['age']; ?></td>
                            <td><?php echo $trainer['height']; ?></td>
                            <td><?php echo $trainer['weight']; ?></td>
                            <td><?php echo $trainer['cpf']; ?></td>
                            <td><?php echo $trainer['rg']; ?></td>
                            <?php
                            echo "<td><a style='color:blue;' href='atualizartrainer.php?id={$trainer['id']}'>Atualizar</a></td>";
                            ?>
                            </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
            </fieldset>
</body>
</html>