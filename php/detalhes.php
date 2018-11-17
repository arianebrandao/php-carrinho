<?php
	include("conexao.php");
	
	function buscaProduto($id){
		$sql = mysql_query("select * from produto where id = $id");
	
		if($sql){
			$texto = "";
			
			while($resp = mysql_fetch_array($sql))
				$texto .= "<h2>$resp[1]</h2><img src=\"produtos/$resp[3]\" width=\"250\" height=\"250\" /><br/>Preço: R\$ ".number_format($resp[4], 2, ",", ".")."<br/>Detalhes:<br/ >$resp[2]<br /><a href=\"login.php?id=$resp[0]\">Comprar</a><hr/>";
				
			echo $texto;
		}else
			echo mysql_error($sql);
	}
?>