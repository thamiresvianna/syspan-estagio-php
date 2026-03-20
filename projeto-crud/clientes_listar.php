<?php
    require_once 'conexao.php';

    $nomebusca = trim($_GET['q'] ?? '');

    $sql = 'SELECT id, nome, email, telefone, created_at FROM clientes';

    if($nomebusca !== ''){
        $sql .= ' WHERE nome LIKE :q';
        $consulta = $pdo->prepare($sql);
        $consulta -> bindValue(':q', '%' . $nomebusca . '%');
        $consulta -> execute();
    } else {
        $consulta = $pdo->query($sql);
    }

    $clientes = $consulta->fetchAll();
?>

<h2>Lista de Clientes</h2>

<form method="get">
    <input type="text" name="q" placeholder="Buscar por nome..." value="<?= htmlspecialchars($nomebusca ?? '') ?>">
    <button type="submit">BUSCAR</button>
</form>

<?php if($nomebusca): ?>
    <p>Buscando por: <?= htmlspecialchars($nomebusca) ?></p>
<?php endif; ?>

<?php if(count($clientes) > 0): ?>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Data</th>
        </tr>

        <?php foreach($clientes as $row): ?>

        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= htmlspecialchars($row["nome"]) ?></td>
            <td><?= htmlspecialchars($row["email"]) ?></td>
            <td><?= htmlspecialchars($row["telefone"]) ?></td>
            <td><?= $row["created_at"] ?> </td>
        </tr>
        
        <?php endforeach; ?>
    </table>

    <?php else: ?>
        <p>Nenhum cliente registrado.</p>
<?php endif; ?>