<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<title>Cadastro de produto</title>
	</head>
	<body>
		<?php
			include("php/menu.php");
		?>
		<form action="php/cadproduto.php" method="post" enctype="multipart/form-data">
			Nome: <input type="text" maxlength="25" name="nome" size="20" /><br />
			Descrição:<br /><textarea name="descricao" cols="30" rows="20"></textarea><br />
			Foto: <input type="file" name="foto" /><br />
			Preço: <input type="text" maxlength="8" name="preco" size="8" /><br />
			Categoria: 
				<select name="idcategoria">
					<?php
						include("php/combocategoria.php");
					?>
				</select><br />
			<input type="submit" value="Cadastrar" />
			<input type="reset" value="Limpar" /><br />
		</form>
	</body>
</html>