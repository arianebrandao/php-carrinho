<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<title>Cadastro de categoria</title>
	</head>
	<body>
		<?php
			include("php/menu.php");
		?>
		<form action="php/cadcategoria.php" method="post">
			Nome: <input type="text" maxlength="15" name="nome" size="13" /><br />
			<input type="submit" value="Cadastrar" />
			<input type="reset" value="Limpar" /><br />
		</form>
	</body>
</html>