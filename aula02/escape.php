<h2>Sanitização e escape</h2>

<form method="post">
    <label>Digite algo para testar:</label>
    <input type="text" name="teste"> <br><br>

    <button type="submit">ENVIAR</button>
</form>

<?php
    if(isset($_POST['teste'])){
        $teste = $_POST['teste'];

        echo "<h3>Imprimir texto diretamente:</h3>";
        echo $teste;

        echo "<h3>Imprimir texto com htmlspecialchars:</h3>";
        echo htmlspecialchars($teste);
    }
?>