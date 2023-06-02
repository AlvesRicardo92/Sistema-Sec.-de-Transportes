<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');

	require "conexaoBanco.php";


    $usuarioPOST = $_POST["usuario"];
    $senhaPOST = $_POST["senha"];
    if(!isset($usuarioPOST)|| !isset($senhaPOST)){
        echo "erro login";
        exit();
    }
    else{
        $sql = "SELECT id, nome,senha FROM login WHERE nome like '" .$usuarioPOST. "'";
        if ($result = $mysqli->query($sql)) {
            $linhas = $result -> num_rows;
            if($linhas>0){ 
                while($row = mysqli_fetch_array($result)) {
                    $usuarioBanco = $row['nome'];
					$senhaBanco = $row['senha'];
					$id = $row['id'];
                }
                $result -> free_result();
                if ($senhaPOST == senhaBanco){
					session_start();
					$_SESSION['id']= $id;
					header("Location: index3.php");
					exit();
				}
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