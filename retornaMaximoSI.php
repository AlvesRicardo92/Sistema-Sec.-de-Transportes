<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');


	require "conexaoBanco.php";

	$sql = "SELECT MAX(ID) as maximo FROM si WHERE ANO = ?"
	$ano=DATE('Y');
	if ($stmt->execute()) {
		$resultado = $stmt->get_result();
		$dados = $resultado->fetch_assoc();
		$dados2 = $dados[0];
		$id = intval($dados2['maximo']);

		if ($id == null){
			echo 1;
		}
		else{
			echo $id+1;
		}
		$resultado -> free_result();
	}
	else{
		echo "erro no retornaMaximoSI";
	}
?>