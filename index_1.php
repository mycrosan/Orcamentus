<?php
session_start(); // Inicia a sessão
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Carrinho com Session</title>
</head>
<body>
<li><a href="produtos.php">Produtos</a></li>
<li><a href="destroisessao.php">Limpar pedido</a></li>
<?php
//Condição para saber se o que veio pela requisição foi um GET
if($_GET){	
	echo"<br>"."LISTA:"."<br>";
	$id = $_GET['id'];
	$nome= $_GET['nome'];
	$descricao = $_GET['descricao'];
	$preco = $_GET['preco'];
	$valores = array($id,$nome,$descricao,$preco);
	//INSERE NA SESSÃO cesta um array contendo os valores recebidos pelo GET
	$_SESSION['cesta'][$id] = array($valores);
	echo"<table border='1'>";
	echo"<tr><td>CÓDIGO</td><td>PRODUTO</td><td>QTD</td><td>PREÇO</td></tr>";
	//Inicia a variável $total para fazer a soma
	$total = 0;
	
	foreach($_SESSION['cesta'] as $indice){		
		foreach( $indice as $indice2){
			$total = $total + $indice2[3];
			echo"<tr><td>".$indice2[0]."</td><td>".$indice2[1]."</td><td><input type='text' value='1'></td><td>".$indice2[3]."</td></tr>";	
		}		
	}
	echo"<tr><td>&nbsp</td><td>&nbsp</td><td>TOTAL</td><td>".$total."</td></tr>";
	echo"</table>";	
}
?>
</body>
</html>
