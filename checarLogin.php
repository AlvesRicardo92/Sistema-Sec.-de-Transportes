<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');

	require "conexaoBanco.php";



    
    if(!isset($_POST["usuario"])|| !isset($_POST["senha"])){
        echo "erro login";
        exit();
    }
    else{
        $usuarioPOST = $mysqli -> real_escape_string($_POST["usuario"]);
        $senhaPOST = $mysqli -> real_escape_string($_POST["senha"]);

        $stmt = $mysqli->prepare("SELECT identificacao, nome,senha FROM login WHERE nome like ?");
        $stmt->bind_param('s', $usuarioPOST);

        //$sql = "SELECT identificacao, nome,senha FROM login WHERE nome like '" .$usuarioPOST. "'";
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            $linhas = $resultado ->num_rows;
            if($linhas>0){ 
                while($row = $resultado->fetch_assoc()) {
                    $usuarioBanco = $row['nome'];
					$senhaBanco = $row['senha'];
					$id = $row['identificacao'];
                }
                //$result -> free_result();
                if ($senhaPOST == $senhaBanco){
					session_start();
					$_SESSION['id']= $id;
					echo $id;
					exit();
				}
            }
            else{
                //$result -> free_result();
                echo "Não encontrado";
            }
        }
        else{
            echo $sql."\n";
            echo "erro na busca do usuário ou senha\n";
        }
        $stmt->close();
        $mysqli->close();
    }
?>