<?php
	session_start();
	
	$indice = $_POST['item'];
	$quant = $_POST['quantidade'];
	
	$quantidades = explode(",",$_SESSION['quantidades']);
	
	$quantidades[$indice] = $quant;
	
	$_SESSION['quantidades'] = implode(",",$quantidades);
	
	header("location:../carrinho.php");
?>