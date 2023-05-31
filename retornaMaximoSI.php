<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');


require "conexaoBanco.php";

$sql = "SELECT MAX(ID) as maximo FROM si WHERE ANO = ".DATE('Y');
$result = $mysqli->query($sql);
$dados = $result->fetch_all(MYSQLI_ASSOC);
$dados2 = $dados[0];
$id = intval($dados2['maximo']);

if ($id == null){
	echo 1;
}
else{
	echo $id+1;
}
$result -> free_result();
?>