<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');


	require "conexaoBanco.php";

	$sql = "SELECT MAX(ID) as maximo FROM si WHERE ANO = ?";
	$ano=DATE('Y');
	$stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $ano);
	if ($stmt->execute()) {
		$resultado = $stmt->get_result();
		$dados = $resultado->fetch_assoc();
		$id = intval($dados['maximo']);

		if ($id == null){
			echo 1;
		}
		else{
			echo $id+1;
		}
		$resultado -> free_result();
		$stmt->close();
	}
	else{
		echo "erro no retornaMaximoSI";
	}
?>