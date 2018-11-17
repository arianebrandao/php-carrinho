<?php
	include("conexao.php");
	
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	$sql = mysql_query("select * from cliente where login='$login' and senha='$senha' and status=1");
	
	if(mysql_num_rows($sql) == 1){
		session_start();
		
		$resp = mysql_fetch_array($sql);
		$produto = $_POST['produto'];
		
		$_SESSION['clienteNome'] = $resp[1];
		$_SESSION['clienteId'] = $resp[0];
		$_SESSION['produtos'] = $produto;
		$_SESSION['quantidades'] = 1;
		
		header("location:../carrinho.php");
	}else
		header("location:../login.php");
?>