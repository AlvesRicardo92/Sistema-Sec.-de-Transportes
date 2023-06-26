<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');
# Substitua abaixo os dados, de acordo com o banco criado
require "conexaoBanco.php";

$comando="";
// Checar conexão
if ($mysqli -> connect_errno) {
    exit();
}
else{
    
    if(!isset($_POST["tipoPesquisa"])||!isset($_POST["valorPesquisado"])){
        echo "erro de variáveis radioButton ou valor pesquisado";
        exit;
    }
    else{
        $tipoPesquisa = $mysqli -> real_escape_string($_POST["tipoPesquisa"]);
        $valorPesquisado = $mysqli -> real_escape_string($_POST["valorPesquisado"]);
        $tabela="";
        $linhas = 0;
        if($tipoPesquisa=="numero"){
            $sql = "SELECT * FROM si WHERE ID=?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('i', $valorPesquisado);
        }
        else if($tipoPesquisa=="endereco"){
            $sql = "SELECT * FROM  si WHERE LOGRADOURO like ?";
            $stmt = $mysqli->prepare($sql);
            $valorPesquisado = "%" . $valorPesquisado . "%";
            $stmt->bind_param('s', $valorPesquisado);
        }
        else if($tipoPesquisa=="funcionario"){
            $sql = "SELECT * FROM  si WHERE RESP1 like ? or RESP2 like ?";
            $stmt = $mysqli->prepare($sql);
            $valorPesquisado = "%" . $valorPesquisado . "%";
            $stmt->bind_param('ss', $valorPesquisado,$valorPesquisado);
        }

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $linhas = $result -> num_rows;
            $contador=1;
            if($linhas>0){ 
                while($row = $result->fetch_assoc()) {
                    $tabela= $tabela . "<tr id='".$contador."' style='width:0px;'><td class='end'>".$row['ID']."/".$row['ANO']."</td><td class='bai'>".$row['RESP1']."</td><td class='bai'>".$row['LOGRADOURO']."</td><td><button type='button' class='btn escolherSI'><i class='fas fa-check' style='font-size:16px;'>Escolher</i></button></td></tr>";
                    $contador++;
                }
                $stmt->close();
                $result -> free_result();
                echo $tabela;
            }
            else{
                $stmt->close();
                $result -> free_result();
                echo "Não encontrado";
            }
        }
        else{
            echo $sql."\n";
            echo "erro na busca do endereço\n";
        }
        $mysqli->close();
    }
}
?>