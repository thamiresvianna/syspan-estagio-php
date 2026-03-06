<?php
    $nome = "João";
    $idade = 20;
    $salario = 1500.00;
    $ativo = true;

    echo "Nome: $nome <br>";
    echo "Idade: $idade <br>";
    echo "Salário: R$$salario <br>";
    echo "Ativo: $ativo <br>";

    $novoSalario = $salario * 1.10;
    echo "<br>Novo salário com aumento de 10%: R$$novoSalario";
?>