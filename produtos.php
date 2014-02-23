<?php 
session_start();
include 'conexao.php';
 if (empty($_SESSION['carrinho']));

$res = mysql_query("select * from produto");
echo "<table border ='1'><tr><td>Nome</td><td>Descricao</td><td>Estoque</td><td>Preço</td><td>&nbsp</td></tr>";
while($escrever=mysql_fetch_array($res)){
	$id = $escrever['idproduto'];
	$nome = $escrever['nome'];
	$descricao = $escrever['descricao'];
	$preco = $escrever['preco'];
	/*Escreve cada linha da tabela*/
	echo "<tr><td>" . $escrever['nome'] . "</td><td>" . $escrever['descricao'] . "</td><td>" . $escrever['quantidade'] . "</td><td>" . $escrever['preco'] . "</td><td>" . "<a href='index.php?id=$id&nome=$nome&descricao=$descricao&preco=$preco'>Adicionar</a>" . "</td></tr>";

}/*Fim do while*/

echo "</table>"; /*fecha a tabela apos termino de impressão das linhas*/

//mysql_close(conexao);


?>
<input type="button" value="Fechar" class="close"/>
</div>
<!-- Fim Janela Modal com Bloco de Nota -->

<table border ="1">
