<?php
session_start();
$item = $_GET['id'];
echo $item;
unset($_SESSION['cesta'][$item]);
?>
<script>
    location.href = "index.php?acao=voltar";
</script>