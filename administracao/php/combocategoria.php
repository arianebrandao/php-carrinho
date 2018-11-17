<?php
	include("conexao.php");
	
	$sql = mysql_query("select * from categoria order by nome");
	
	if(mysql_num_rows($sql) > 0){
		$texto = "";
		
		while($resp = mysql_fetch_array($sql))
			$texto .= "<option value=\"$resp[0]\">$resp[1]</option>";
			
		echo $texto;
	}else
		echo "<option value=\"null\">Cadastre uma categoria</option>";
?>