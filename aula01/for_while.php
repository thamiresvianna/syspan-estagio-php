<?php
    echo "<h3>Números de 1 a 50 com For:</h3>";
    for($i=1; $i<=50; $i++){
        echo "$i ";
    }

    echo "<h3>Números Pares de 2 a 100 com While:</h3>";
    $num = 1;
    while($num <= 100){
        if($num % 2 == 0){
            echo "$num ";
        }
        $num++;
    }

    echo "<h3>Soma de 1 a 100:</h3>";
    $soma = 0;
    for($i=1; $i<=100; $i++){
        $soma += $i;
    }
    echo "Total: $soma";
?>