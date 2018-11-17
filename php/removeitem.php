<?php
	session_start();
	
	$indice = $_POST['item'];
	
	$quantidades = explode(",",$_SESSION['quantidades']);
	$produtos = explode(",",$_SESSION['produtos']);
	
	array_splice($quantidades, $indice, 1);
	array_splice($produtos, $indice, 1);
	
	if(count($produtos) >= 1){
		$_SESSION['produtos'] = implode(",", $produtos);
		$_SESSION['quantidades'] = implode(",", $quantidades);
	}else{
		$_SESSION['produtos'] = array();
		$_SESSION['quantidades'] = array();
	}
	
	header("location:../carrinho.php");
?>