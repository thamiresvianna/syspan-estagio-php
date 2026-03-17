<?php
    $erros = [];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["name"];
        $email = $_POST["email"];
        $mensagem = $_POST["mensagem"];

        if(strlen($nome) < 3){
            $erros[] = "Nome deve conter no mínimo 3 caracteres.";
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erros[] = "E-mail inválido.";
        }
        
        if(strlen($mensagem) < 10){
            $erros[] = "Mensagem deve conter no mínimo 10 caracteres.";
        }
    }
?>

<h2>Formulário de Contato (POST)</h2>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($erros)){
        foreach($erros as $erro){
            echo $erro . "<br>";
        }
    }
?>

<form method="post">
    <label>Nome:</label><br>
    <input type="text" name="name"><br>

    <label>E-mail:</label><br>
    <input type="text" name="email"><br>

    <label>Mensagem:</label><br>
    <textarea name="mensagem"></textarea><br><br>

    <button type="submit">ENVIAR</button>
</form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && empty($erros)){
        echo "<h3>Dados:</h3>";
        echo "Nome: $nome <br>";
        echo "E-mail: $email <br>";
        echo "Mensagem: $mensagem";
    }
?>