<?php
    require_once 'conexao.php';
    require_once 'logger.php';

    $id = (int) ($_GET['id'] ?? 0);

    if($id <= 0){
        die("ID inválido.");
    }

    $sql = 'SELECT id, nome, email, telefone, created_at FROM clientes WHERE id = :id';
    $consulta = $pdo->prepare($sql);
    $consulta -> execute([':id' => $id]);
    $cliente = $consulta->fetch();

    if(!$cliente){
        die("Cliente não encontrado.");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = 'DELETE FROM clientes WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":id" => $id]);

        if($stmt->rowCount() === 0){
            die("Erro ao excluir cliente.");
        }

        registrarLog("Cliente excluído: ID - $id");

        header("Location: clientes_listar.php?excluido=1");
        exit;
    }

    require_once 'layout_header.php';
?>

<h2>Excluir Cliente</h2>

<p>Tem certeza que deseja excluir o cliente: <strong><?= htmlspecialchars($cliente["nome"]) ?></strong>?</p>

<form method="post">
    <button type="submit" style="background-color: red; color: white; padding: 10px 12px; border-radius: 8px; border: none; font-size: 16px;">Excluir</button>
    <a href="clientes_listar.php" style="color: black; padding: 10px 12px; border-radius: 8px; text-decoration: none; font-size: 16px;">Cancelar</a>
</form>

<?php require_once 'layout_footer.php'; ?>