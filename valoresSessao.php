<tbody>
<div id="tabela">
    <?php
    if (empty($_SESSION['cesta'])) {
        echo"<div class='alert alert-warning'>";
        echo"Ainda não temos itens no orçamento:";
        echo"</div>";
    } else {
        echo"<table border='1' class='table table-hover-inline'>";

        echo" <h2><center><legend>Orçamento</legend></center></h2>";
        echo"<tr class='info'><td>QUANT.</td><td>DESCRIÇÃO</td><td>P.UNITÁRIO</td><td>P.TOTAL</td><td>OPÇÕES</td></tr>";
        //Inicia a vari�vel $total para fazer a soma
        $total2 = 0;
        foreach ($_SESSION['cesta'] as $indice) {
            foreach ($indice as $indice2) {
                $total2 = $total2 + $indice2[4];
                echo"<tr>";
                // <!--# -->
                //<td>" . $indice2[0] . "</td>
                // <!--Quant -->
                echo "<td>" . $indice2[1] . "</td>
                    <!--Descrição -->
                <td>" . $indice2[2] . "</td>
                   <!--P.UNITÁRIO-->
                <td> R$ " . number_format($indice2[3], 2, ',', '.') . "</td>
                     <!--P.TOTAL-->
                <td>R$ " . number_format($indice2[4], 2, ',', '.') . "</td>
                     <!--EXCLUIR -->
                <td> <a href='excluiritem.php?id=$indice2[0]'>Excluir</a></td></tr>";
            }
        }
        echo"<tr><td>&nbsp</td><td>&nbsp</td><td>TOTAL DO ORÇAMENTO</td><td class='danger'>R$ " . number_format($total2, 2, ',', '.') . "</td></tr>";
        echo"</table>";
    }
    ?>
</div>
</tbody>

