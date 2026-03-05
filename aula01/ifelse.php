<?php
    function verificaNota($nota){
        if ($nota >= 7){
            return "Aprovado!";
        }
        elseif ($nota >= 5){
            return "Recuperação.";
        }
        else{
            return "Reprovado.";
        }
    }

    $alunoNota = 8;

    echo "Nota: $alunoNota <br>";
    echo verificaNota($alunoNota);
?>