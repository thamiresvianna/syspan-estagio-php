<?php
    $produtos = array(
        ["nome" => "Lápis 07", "preco" => 14.60],
        ["nome" => "Borracha", "preco" => 7.40],
        ["nome" => "Caderno", "preco" => 24.99],
        ["nome" => "Estojo", "preco" => 29.50],
    );
    
    echo "<h3>Produtos:</h3>";

    $total_soma = 0;
    $produto_maiscaro = $produtos[0];

    foreach($produtos as $item){
        echo $item["nome"] . " - R$ " . $item["preco"] . "<br>";

        $total_soma += $item["preco"];

        if($item["preco"] > $produto_maiscaro["preco"]){
            $produto_maiscaro = $item;
        }
    }

    echo "<br>Total dos preços: R$ $total_soma";
    echo "<br>Produto mais caro: " . $produto_maiscaro["nome"] . " - Preço: R$ " . $produto_maiscaro["preco"];
?>