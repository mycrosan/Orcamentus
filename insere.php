<?php
session_start(); // Inicia a sess�o
      $id = 1;
        if ($_POST) {
            @$cliente = $_POST['cliente'];
            @$empresa = $_POST['empresa'];
            $_SESSION['cliente'] = $cliente;
            $_SESSION['empresa'] = $empresa;
            if (@$_SESSION['cesta'] != null) {
                foreach (@$_SESSION['cesta'] as $key => $coisas) {
                    foreach ($coisas as $value) {
                        $id = $value[0] + 1;
                    }
                }
            }
        }
        @$acao = $_GET['acao'];
       
            $descricao = $_POST['descricao'];
            $pega_un = $_POST['unidade'];
            $quant = $_POST['quant'] . " " . $pega_un;
            "O que acontece com os números";
            $p_unitario = $_POST['p_unitario'];
            $p_unitario = str_ireplace(".","",$p_unitario);
            $p_unitario = str_ireplace(",",".",$p_unitario);
            $p_total = $quant * $p_unitario;
            $valores = array($id, $quant, $descricao, $p_unitario, $p_total);
            //INSERE NA SESS�O cesta um array contendo os valores recebidos pelo GET
        $_SESSION['cesta'][$id] = array($valores);    
       
           
        
        ?>
<script>
        location.href="index.php";
</script>
