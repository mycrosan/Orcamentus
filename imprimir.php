<?php session_start(); // Inicia a sess�o       ?>
<html lang='pt'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crie orçamentos para seus clientes online e grátis ferramenta para MEI,Autônomos e Micro Empresários</title>    
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="bootstrap/js/formatapreco.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <script src="bootstrap/js/bootstrap.js"></script>        
    </head>
    <body>
    <center>
        <?php
        if (empty($_SESSION['cesta'])) {
            echo "Esse orçamento já foi enviado ou não existe ainda";
        } else {
            $cabeca = " <h2>Orçamento</h2>" .
                    "<table border='1' class='table table-striped' >" .
                    "<tr class='info'><td>QUANT.</td><td>DESCRIÇÃO</td><td>P.UNITÁRIO</td><td>P.TOTAL</td></tr>";
//Inicia a vari�vel $total para fazer a soma
            $total = 0;
//$corpo=array();
            foreach ($_SESSION['cesta'] as $indice) {
                foreach ($indice as $indice2) {
                    $total = $total + $indice2[4];
                    $corpo = "<tr>
                <td>" . $indice2[1] . "</td>
                <td>" . $indice2[2] . "</td><td>R$ " . $indice2[3] . "</td>
                     <td>R$ " . $indice2[4] . "</td>";
                }

                @$tudo = $tudo . $corpo . "</tr>";
            }

            $totalgeral = "<tr><td></td><td></td><td>TOTAL DO ORÇAMENTO</td><td>R$ " . number_format($total, 2, '.', ' ') . "</td></tr>" . "</table>";
//Opçoes de configuração do e-mail
         echo"<SCRIPT LANGUAGE='JavaScript'>
            window.print()
             </SCRIPT>";
        
        echo $message = "Aos cuidados de " . $_SESSION['cliente'] . "<br> Responsável " . $_SESSION['empresa'] . $cabeca . $tudo . $totalgeral;
        }
             ?>
         <ul class="nav navbar-nav">
        <li ><a href="/" >Voltar</a></li>
         </ul>
       
    </center>
</body>
</html>