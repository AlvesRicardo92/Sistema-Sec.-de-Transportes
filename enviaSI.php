<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');


require "conexaoBanco.php";

if( !isset($_POST["numeroSI"])||!isset($_POST["siData"])|| !isset($_POST["responsavel1"]) ||
	!isset($_POST["responsavel2"])|| !isset($_POST["destino"]) || !isset($_POST["solicitante"]) ||
	!isset($_POST["assunto"]) || !isset($_POST["logradouro"]) || !isset($_POST["bairro"]) ||
	!isset($_POST["numeroEndereco"])|| !isset($_POST["obs"]) || !isset($_POST["anotacoes"])|| !isset($_POST["prioridade"])){
		echo "erro de variável";
		exit();
	}
	else{
		$numeroSI= $_POST["numeroSI"];
		$siData= $_POST["siData"];
		$responsavel1= $_POST["responsavel1"];
		$responsavel2= $_POST["responsavel2"];
		$destino= $_POST["destino"];
		$solicitante= $_POST["solicitante"];
		$assunto= $_POST["assunto"];
		$logradouro= $_POST["logradouro"];
		$bairro= $_POST["bairro"];
		$numeroEndereco= $_POST["numeroEndereco"];
		$obs= $_POST["obs"];
		$anotacoes= $_POST["anotacoes"];
		$prioridade= $_POST["prioridade"];
		
		$sql = "INSERT INTO si values(".$numeroSI.",'".$siData."','".$solicitante."','".$destino."','".$responsavel1."','".$responsavel2."','".$assunto."','".$logradouro."','".$bairro."','".$prioridade."',".date("Y").",'','".$obs."','usuarioCriacao','".$numeroEndereco."','".$anotacoes."')";
        if ($result = $mysqli->query($sql)) {
            $linhasAfetadas = $mysqli->affected_rows;
            //$result -> free_result();
            echo $linhasAfetadas;
		}
        else{
            echo $sql."\n";
            echo "Erro ao cadastrar os dados da diária\n";
        }
        $mysqli->close();
	}




?>