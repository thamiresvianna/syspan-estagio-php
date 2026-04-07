<?php
    require_once 'conexao.php';
    require_once 'clientes_repo.php';
    require_once 'layout_header.php';

    $pagina = (int)($_GET['pagina'] ?? 1);
    $limite_registros = 5;

    if($pagina < 1){
        $pagina = 1;
    }

    $offset = ($pagina - 1) * $limite_registros;

    $nomebusca = trim($_GET['q'] ?? '');
    $status = $_GET['status'] ?? '';

    $clientes = listarClientes($pdo, $nomebusca, $status, $limite_registros, $offset);
    $totalClientes = contarClientes($pdo, $nomebusca, $status);
    
    $total_pags = ceil($totalClientes / $limite_registros);
?>

<h2>Lista de Clientes</h2>

<?php if(isset($_GET['sucesso'])): ?>
    <script>
        alert("Cliente cadastrado com sucesso!")
    </script>
<?php endif; ?>

<?php if(isset($_GET['editado'])): ?>
    <script>
        alert("Cliente atualizado com sucesso!")
    </script>
<?php endif; ?>

<?php if(isset($_GET['excluido'])): ?>
    <script>
        alert("Cliente excluído com sucesso!")
    </script>
<?php endif; ?>

<form method="get" class="caixa-busca">
    <input type="text" name="q" placeholder="Buscar por nome..." value="<?= htmlspecialchars($nomebusca) ?>">

    <select name="status">
        <option value="">Todos</option>
        <option value="ATIVO" <?= $status == 'ATIVO' ? 'selected' : '' ?>>Ativo</option>
        <option value="INATIVO" <?= $status == 'INATIVO' ? 'selected' : '' ?>>Inativo</option>
    </select><br><br>

    <button type="submit">Buscar</button>
</form>

<?php if($nomebusca): ?>
    <p>Buscando por: <?= htmlspecialchars($nomebusca) ?></p>
<?php endif; ?>

<?php if($status): ?>
    <p>Filtrando por status: <?= htmlspecialchars($status) ?></p>
<?php endif; ?>

<?php if(count($clientes) > 0): ?>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Data</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>

        <?php foreach($clientes as $row): ?>

        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= htmlspecialchars($row["nome"]) ?></td>
            <td><?= htmlspecialchars($row["email"]) ?></td>
            <td><?= htmlspecialchars($row["telefone"]) ?></td>
            <td><?= date('d/m/Y H:i', strtotime($row["created_at"])) ?></td>
            <td><?= htmlspecialchars($row["status"]) ?></td>
            <td>
                <a href="clientes_editar.php?id=<?= $row["id"] ?>">Editar</a>
                <a href="clientes_excluir.php?id=<?= $row["id"] ?>">Excluir</a>
            </td>
        </tr>
        
        <?php endforeach; ?>
    </table>

    <div class="paginacao">
        <?php for($i=1; $i <= $total_pags; $i++): ?>
            <a href="?pagina=<?= $i ?>&q=<?= urlencode($nomebusca) ?>&status=<?= urlencode($status) ?>" class="<?= $i == $pagina ? 'ativa' : '' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>
    </div>

    <?php else: ?>
        <p>Nenhum cliente registrado.</p>
<?php endif; ?>

<?php require_once 'layout_footer.php'; ?>