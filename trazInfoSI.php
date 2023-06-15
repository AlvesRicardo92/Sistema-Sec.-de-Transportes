<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');

	require "conexaoBanco.php";


    $idSI = $_POST["idSI"];
    $anoSI = $_POST["anoSI"];
    if(!isset($idSI)|| !isset($anoSI)){
        echo "erro de variáveis";
        exit();
    }
    else{
        $sql = "SELECT * FROM si WHERE id =".$idSI." and ano=".$anoSI;
        if ($result = $mysqli->query($sql)) {
            $linhas = $result -> num_rows;
            if($linhas>0){ 
                while($row = mysqli_fetch_array($result)) {
                    /* posições do vetor
                        0=numeroSI
                        1=dataSI
                        2=prioridadeSI
                        3=resp1
                        4=resp2
                        5=destino
                        6=solicitante
                        7=assunto
                        8=logradouro
                        8=numeroEndereco
                        9=bairro
                        10=obs
                        11=anotacoes
                        12=usuarioCriacao
                    */
                    $resultadoSI = array($row['ID'],
                                        $row['DATA'],
                                        $row['PRIORIDADE'],
                                        $row['RESP1'],
                                        $row['RESP2'],
                                        $row['DESTINO'],
                                        $row['SOLICITANTE'],
                                        $row['ASSUNTO'],
                                        $row['LOGRADOURO'],
                                        $row['NUMEROENDERECO'],
                                        $row['BAIRRO'],
                                        $row['OBS'],
                                        $row['ANOTACOES'],
                                        $row['USUARIOCRIACAO']);
                }
                $result -> free_result();
				echo $resultadoSI;
            }
            else{
                $result -> free_result();
                echo "Não encontrado";
            }
        }
        else{
            echo $sql."\n";
            echo "erro na busca do usuário ou senha\n";
        }
        $mysqli->close();
    }
?>