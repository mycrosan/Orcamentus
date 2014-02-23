<?php
$valor="1,56";
function dinheiro_de_br($valor) {

    	$valor = str_ireplace(".","",$valor);

        $valor = str_ireplace(",",".",$valor);

        return $valor;

    }

    	

    function dinheiro_para_br($valor) {

    	$valor = number_format($valor, 2, ',', '.');

    	return $valor;

    }



    	//echo "<td>R$ " . $quantidade * $valor_unit . "</td>";

    	$valor_unit = $quantidade * dinheiro_de_br($valor_unit);

echo '<td>R$ ' . dinheiro_para_br($valor_unit) .'</td>'; 
?>