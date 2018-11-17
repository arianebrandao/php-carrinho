<?php
	include("conexao.php");
	
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$foto = $_FILES['foto']['name'];
	$foto_tmp = $_FILES['foto']['tmp_name'];
	$foto_tipo = $_FILES['foto']['type'];
	$preco = $_POST['preco'];
	$idcategoria = $_POST['idcategoria'];
	
	if(strlen(strstr($foto_tipo, "image")) > 0){
		$sql = mysql_query("insert into produto values(null, '$nome', '$descricao', '$foto', $preco, $idcategoria)");
		
		if($sql){
			move_uploaded_file($foto_tmp, "../../produtos/$foto");
	
			header("location:../cadproduto.php");
		}else
			echo mysql_error($sql);
	}else
		echo "O arquivo escolhido não é uma imagem";
?>