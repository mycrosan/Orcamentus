<?php session_start(); // Inicia a sess�o   ?>
<html lang='pt'>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Crie orçamentos para seus clientes online e grátis ferramenta para MEI,Autônomos e Micro Empresários</title>    
        <!-- Bootstrap -->
        <script src='https://code.jquery.com/jquery.js'></script>        
        <link rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>

        <!-- Optional theme -->
        <link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css'>

        <!-- Latest compiled and minified JavaScript -->
        <script src='//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>       
    </head>
    <?php
    if (empty($_SESSION['cesta'])) {
        echo "Esse orçamento já foi enviado ou não existe ainda";
    } else {
        $email_c = $_POST['email_c'];
        $email_ps = $_POST['email_ps'];
        $obs = $_POST['obs'];


        $cabeca = " <h2>Orçamento</h2>" .
                "<table border='1' >" .
                "<tr><td>QUANT.</td><td>DESCRIÇÃO</td><td>P.UNITÁRIO</td><td>P.TOTAL</td></tr>";
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

        $totalgeral = "<tr><td></td><td></td><td></td><td>TOTAL DO ORÇAMENTO</td><td>R$ " . number_format($total, 2, '.', ' ') . "</td></tr>" . "</table>";
//Opçoes de configuração do e-mail
        $to = $email_c;
        $subject = 'Orçamento ' . @$_SESSION['empresa'];
        echo $message = "Aos cuidados de " . $_SESSION['cliente'] . "<br> Responsável " . $_SESSION['empresa'] . $cabeca . $tudo . $totalgeral . "<br>" . $obs . "<br>";
        $headers =
                'From:' . $email_ps . "\r\n" .
                'Reply-To:' . $email_ps . "\r\n" .
                'MIME-Version: 1.0' . "\r\n" .
                'Content-type: text/html; charset=utf-8' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            echo "Email enviando certinho";
            session_destroy();
            unset($_SESSION);
        } else {
            echo "Deu Falha atualize a pagina";
        }
    }
    echo "<a href='/'>Voltar<a>";
    ?>
                       

