<?php
    require_once 'conexao.php';
    require_once 'logger.php';

    $erros = [];
    $nome = '';
    $email = '';
    $telefone = '';
    $status = 'ATIVO';

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
            $sql = 'INSERT INTO clientes (nome, email, telefone, status) VALUES (:nome, :email, :telefone, :status)';
            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ":nome" => $nome,
                ":email" => $email,
                ":telefone" => $telefone,
                ":status" => $status
            ]);

            registrarLog("Cliente cadastrado: $nome");

            header("Location: clientes_listar.php?sucesso=1");
            exit;
        }
    }

    require_once 'layout_header.php';
?>

<h2>Cadastrar Cliente</h2>

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
    <input type="text" name="telefone" value="<?= htmlspecialchars($telefone ?? '') ?>"><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="ATIVO" <?= $status == 'ATIVO' ? 'selected' : '' ?>>Ativo</option>
        <option value="INATIVO" <?= $status == 'INATIVO' ? 'selected' : '' ?>>Inativo</option>
    </select><br><br>
    
    <button type="submit">Salvar</button>
</form>

<?php require_once 'layout_footer.php'; ?>