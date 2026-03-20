<?php
    require_once 'conexao.php';

    $erros = [];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = trim($_POST["nome"] ?? '');
        $email = trim($_POST["email"] ?? '');
        $telefone = trim($_POST["telefone"] ?? '');

        if(strlen($nome) < 3){
            $erros[] = "Nome deve conter no mínimo 3 caracteres.";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erros[] = "E-mail inválido.";
        }   
        if(empty($erros)){
            $sql = 'INSERT INTO clientes (nome, email, telefone) VALUES (:nome, :email, :telefone)';
            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ":nome" => $nome,
                ":email" => $email,
                ":telefone" => $telefone
            ]);

            header("Location: clientes_listar.php");
            exit;
        }
    }
?>

<h2>Inserir Cliente</h2>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($erros)){
        foreach($erros as $erro){
            echo $erro . "<br>";
        }
    }
?>

<form method="post">
    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($nome ?? '') ?>"><br>

    <label>E-mail:</label><br>
    <input type="text" name="email" value="<?= htmlspecialchars($email ?? '') ?>"><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone" value="<?= htmlspecialchars($telefone ?? '') ?>"><br><br>

    <button type="submit">ADICIONAR</button>
</form>