<?php
    require_once 'conexao.php';
    require_once 'logger.php';

    $erros = [];

    $id = (int) ($_GET['id'] ?? 0);

    if($id <= 0){
        die("ID inválido.");
    }

    $sql = 'SELECT id, nome, email, telefone, created_at, status FROM clientes WHERE id = :id';
    $consulta = $pdo->prepare($sql);
    $consulta -> execute([':id' => $id]);
    $cliente = $consulta->fetch();

    if(!$cliente){
        die("Cliente não encontrado.");
    }

    $nome = $cliente['nome'];
    $email = $cliente['email'];
    $telefone = $cliente['telefone'];
    $status = $cliente['status'];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = trim($_POST["nome"] ?? '');
        $email = trim($_POST["email"] ?? '');
        $telefone = trim($_POST["telefone"] ?? '');
        $status = $_POST["status"] ?? 'ATIVO';

        if(strlen($nome) < 3){
            $erros[] = "Nome deve conter no mínimo 3 caracteres.";
        }
        if($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erros[] = "E-mail inválido.";
        }
        if($telefone === '' || strlen($telefone) < 10){
            $erros[] = "Telefone inválido.";
        }
        if(empty($erros)){
            $sql = 'UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone, status = :status WHERE id = :id';
            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ":nome" => $nome,
                ":email" => $email,
                ":telefone" => $telefone,
                ":status" => $status,
                ":id" => $id
            ]);

            registrarLog("Cliente editado: ID - $id");

            header("Location: clientes_listar.php?editado=1");
            exit;
        }
    }

    require_once 'layout_header.php';
?>

<h2>Editar Cliente</h2>

<?php if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($erros)): ?>
        <div style="color: red">
            <?php foreach($erros as $erro): ?>
                <p><?= htmlspecialchars($erro) ?></p>
            <?php endforeach; ?>
        </div>
<?php endif; ?>

<form method="post">
    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($nome ?? '') ?>"><br>

    <label>E-mail:</label><br>
    <input type="text" name="email" value="<?= htmlspecialchars($email ?? '') ?>"><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone" value="<?= htmlspecialchars($telefone ?? '') ?>"><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="ATIVO" <?= $status == 'ATIVO' ? 'selected' : '' ?>>Ativo</option>
        <option value="INATIVO" <?= $status == 'INATIVO' ? 'selected' : '' ?>>Inativo</option>
    </select><br><br>

    <button type="submit">Salvar</button>
</form>

<?php require_once 'layout_footer.php'; ?>