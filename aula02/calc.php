<h2>Calculadora (GET)</h2>

<form method="get">
    <label>Entrada A:</label><br>
    <input type="number" step="any" name="num1"><br>

    <label>Entrada B:</label><br>
    <input type="number" step="any" name="num2"><br>

    <label>Operador:</label><br>
    <select name="operador">
        <option value="soma">+</option>
        <option value="subtracao">-</option>
        <option value="multiplicacao">*</option>
        <option value="divisao">/</option>
    </select>
    <br><br>

    <button type="submit">CALCULAR</button>
</form>

<?php
    if(isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operador'])) {
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        $operador = $_GET['operador'];

        // Validação
        if ($num1 === '' || $num2 === '') {
            echo "<script>alert('Os campos precisam estar preenchidos');</script>";
            return;
        }

        $num1 = floatval($num1);
        $num2 = floatval($num2);
        $resultado = 0;

        switch($operador){
            case 'soma':
                $resultado = $num1 + $num2;
                break;
            case 'subtracao':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicacao':
                $resultado = $num1 * $num2;
                break;
            case 'divisao':
                if($num2 == 0){
                    echo "Erro: divisão por zero!";
                }
                else{
                    $resultado = $num1 / $num2;
                }
                break;
        }

        echo "Resultado: $resultado";
    }
?>