<?php
	include("conexao.php");
	
	$sql = mysql_query("select * from produto");
	
	if($sql){
		$texto = "";
		
		while($resp = mysql_fetch_array($sql))
			$texto .= "<h2>$resp[1]</h2><img src=\"produtos/$resp[3]\" width=\"200\" height=\"200\" /><br/>Preço: R\$ ".number_format($resp[4], 2, ",", ".")."<br/><a href=\"detalhes.php?id=$resp[0]\">Detalhes</a><hr/>";
			
		echo $texto;
	}else
		echo mysql_error($sql);
?>