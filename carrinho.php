<?php
	session_start();
	
	if(!empty($_SESSION['clienteNome'])){
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<title>Carrinho</title>
	</head>
	<body>
		<h2>Cliente: <?php echo $_SESSION['clienteNome']?></h2>
		<a href="php/logout.php">Logout</a>
		<hr/>
		<table>
			<tr>
				<td>Item</td>
				<td>Produto</td>
				<td>Preço</td>
				<td>Total item</td>
				<td>Quantidade</td>
				<td>Opções</td>
			</tr>
			<?php
				include("php/conexao.php");
				
				$total = 0;
				
				if(count($_SESSION['produtos']) == 0)
					echo "</table><br/>
							<h2>Carrinho vazio!</h2>";
				else{
					$produtos = array();
					$quantidades = array();
					
					$produtos = explode(",",$_SESSION['produtos']);
					$quantidades = explode(",",$_SESSION['quantidades']);
					
					$ind = 0;
					
					while($ind < count($produtos)){
						$sql = mysql_query("select * from produto where id=$produtos[$ind]");
						
						$resp = mysql_fetch_array($sql);
						
						echo "<tr>
								<td>".($ind+1)."</td>
								<td>$resp[1]</td>
								<td>R$ ".number_format($resp[4],2,",",".")."</td>
								<td>R$ ".number_format($resp[4]*$quantidades[$ind],2,",",".")."</td>
								<td>
									<form action=\"php/atualizaitem.php\" method=\"post\">
										<input type=\"hidden\" name=\"item\" value=\"$ind\"/>
										<input type=\"text\" name=\"quantidade\" size=\"3\" value=\"$quantidades[$ind]\"/>
								</td>
								<td>
										<input type=\"submit\" value=\"atualizar\"/>
									</form>
								
									<form action=\"php/removeitem.php\" method=\"post\">
										<input type=\"hidden\" name=\"item\" value=\"$ind\"/>
										<input type=\"submit\" value=\"remover\"/>
									</form>
								</td>
							</tr>";
						$total += ($resp[4]*$quantidades[$ind]);
						$ind++;
					}
					echo "</table>";
				}
				?>
			<br/>
			<h3>Total da compra: <?php echo "R$ ".number_format($total,2,",","."); ?></h3>
			<br/>
			<a href="index.php">Continuar comprando</a>|<a href="#">Finalizar compra</a>
	</body>
</html>
<?php
	}else
		header("location:login.php");
?>