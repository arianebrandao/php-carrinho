<?php
	session_start();
	
	if(empty($_SESSION['clienteNome'])){
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<title>Login</title>
	</head>
	<body>
		<form action="php/login.php" method="post">
			<input type="hidden" name="produto" value="<?php echo $_GET['id']; ?>" />
			Login: <input type="text" maxlength="10" name="login" size="10" /><br />
			Senha: <input type="password" maxlength="10" name="senha" size="10" /><br />
			<input type="submit" value="Logar" />
		</form>
	</body>
</html>
<?php
	}else{
		if(count($_SESSION['produtos']) > 0){
			$_SESSION['produtos'] .= "," . $_GET['id'];
			$_SESSION['quantidades'] .= "," . 1;
		}else{
			$_SESSION['produtos'] = $_GET['id'];
			$_SESSION['quantidades'] = 1;
		}
		header("location:carrinho.php");
	}
?>