<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');

	require "conexaoBanco.php";


    
    if(!isset($_POST["idSI"])|| !isset($_POST["anoSI"])){
        echo "erro de variáveis";
        exit();
    }
    else{
        $idSI = $mysqli -> real_escape_string($_POST["idSI"]);
        $anoSI = $mysqli -> real_escape_string($_POST["anoSI"]);
        $sql = "SELECT * FROM si WHERE id =? and ano=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ii', $idSI,$anoSI);
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            $linhas = $resultado -> num_rows;
            if($linhas>0){ 
                $row = $resultado->fetch_assoc();
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
                        13=iniciais
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
                $resultadoSI = implode("|", $resultadoSI);
                /*echo var_dump($resultadoSI);
                exit();*/
                //$resultadoSI[] = $row;
                $resultado -> free_result();
				echo $resultadoSI;
            }
            else{
                $resultado -> free_result();
                echo "Não encontrado";
            }
        }
        else{
            echo $mysqli->error."\n";
            echo "erro na busca do usuário ou senha\n";
        }
        $mysqli->close();
    }
?>