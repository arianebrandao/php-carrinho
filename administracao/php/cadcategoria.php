<?php
	include("conexao.php");
	
	$nome = $_POST['nome'];
	
	$sql = mysql_query("insert into categoria values(null, '$nome', null)");
	
	if($sql)
		header("location:../cadcategoria.php");
	else
		echo mysql_error($sql);
?>