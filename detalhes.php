<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<title>Detalhes do produto</title>
	</head>
	<body>
		<?php
			include("php/detalhes.php");
			
			buscaProduto($_GET['id']);
		?>
	</body>
</html>