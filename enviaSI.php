<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');


require "conexaoBanco.php";

if( !isset($_POST["numeroSI"])||!isset($_POST["siData"])|| !isset($_POST["responsavel1"]) ||
	!isset($_POST["responsavel2"])|| !isset($_POST["destino"]) || !isset($_POST["solicitante"]) ||
	!isset($_POST["assunto"]) || !isset($_POST["logradouro"]) || !isset($_POST["bairro"]) ||
	!isset($_POST["numeroEndereco"])|| !isset($_POST["obs"]) || !isset($_POST["anotacoes"])|| !isset($_POST["prioridade"])|| !isset($_POST["iniciais"])){
		echo "erro de variável";
		exit();
	}
	else{
		$numeroSI= $mysqli -> real_escape_string($_POST["numeroSI"]);
		$siData= $mysqli -> real_escape_string($_POST["siData"]);
		$responsavel1= $mysqli -> real_escape_string($_POST["responsavel1"]);
		$responsavel2= $mysqli -> real_escape_string($_POST["responsavel2"]);
		$destino= $mysqli -> real_escape_string($_POST["destino"]);
		$solicitante= $mysqli -> real_escape_string($_POST["solicitante"]);
		$assunto= $mysqli -> real_escape_string($_POST["assunto"]);
		$logradouro= $mysqli -> real_escape_string($_POST["logradouro"]);
		$bairro= $mysqli -> real_escape_string($_POST["bairro"]);
		$numeroEndereco= $mysqli -> real_escape_string($_POST["numeroEndereco"]);
		$obs= $mysqli -> real_escape_string($_POST["obs"]);
		$anotacoes= $mysqli -> real_escape_string($_POST["anotacoes"]);
		$prioridade= $mysqli -> real_escape_string($_POST["prioridade"]);
		$iniciais= $mysqli -> real_escape_string($_POST["iniciais"]);
		$ano =date("Y");
		
		$sql = "INSERT INTO si(ID, DATA, SOLICITANTE, DESTINO, RESP1, RESP2, ASSUNTO, LOGRADOURO, BAIRRO, PRIORIDADE, ANO, OBS, USUARIOCRIACAO, NUMEROENDERECO, ANOTACOES) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param('isssssssssissss', $numeroSI,$siData,$solicitante,$destino,$responsavel1,$responsavel2,$assunto,$logradouro,$bairro,$prioridade,$ano,$obs,$iniciais,$numeroEndereco,$anotacoes);
        if ($stmt->execute()) {
            $linhasAfetadas = $stmt->affected_rows;
            echo $linhasAfetadas;
		}
        else{
            echo $mysqli->error."\n";
            echo "Erro ao cadastrar os dados da diária\n";
        }
        $mysqli->close();
	}




?>