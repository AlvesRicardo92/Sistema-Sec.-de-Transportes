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
    $tipoPesquisa = $_POST["tipoPesquisa"];
    $valorPesquisado = $_POST["valorPesquisado"];
    if(!isset($tipoPesquisa)||!isset($valorPesquisado)){
        echo "erro de variáveis radioButton ou valor pesquisado";
        exit;
    }
    else{
        $tabela="";
        $linhas = 0;
        if($tipoPesquisa=="numero"){
            $sql = "SELECT * FROM si WHERE ID=" .$valorPesquisado;
        }
        else if($tipoPesquisa=="endereco"){
            $sql = "SELECT * FROM FROM si WHERE LOGRADOURO like '%" .$valorPesquisado. "%'";
        }
        else if($tipoPesquisa=="funcionario"){
            $sql = "SELECT * FROM FROM si WHERE RESP1 like '" .$valorPesquisado. "' or RESP2 like '" .$valorPesquisado ."'";
        }
        
        if ($result = $mysqli->query($sql)) {
            $linhas = $result -> num_rows;
            $contador=1;
            if($linhas>0){ 
                while($row = mysqli_fetch_array($result)) {
                    $tabela= $tabela . "<tr id='".$contador."' style='width:0px;'><td class='end'>".$row['ID']."/".$row['ANO']."</td><td class='bai'>".$row['RESP1']."</td><td class='bai'>".$row['LOGRADOURO']."</td><td><button type='button' class='btn escolherSI'><i class='fas fa-check' style='font-size:16px;'>Escolher</i></button></td></tr>";
                    $contador++;
                }
                $result -> free_result();
                echo $tabela;
            }
            else{
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