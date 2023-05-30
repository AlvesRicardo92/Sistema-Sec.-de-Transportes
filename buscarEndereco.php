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
    $endereco = $_POST["endereco"];
    $data = date("Y-m-d");
    $hora=date("H:i:s");
    if(!isset($endereco)){
        echo "erro sem endereço";
        exit;
    }
    else{
        $tabela="";
        $linhas = 0;
        $sql = "SELECT * FROM logradouro WHERE nomeLogradouro like '%" .$endereco. "%'";
        if ($result = $mysqli->query($sql)) {
            $linhas = $result -> num_rows;
            $contador=1;
            if($linhas>0){ 
                while($row = mysqli_fetch_array($result)) {
                    $tabela= $tabela . "<tr id='".$contador."' style='width:0px;'><td class='end'>".$row['nomeLogradouro']."</td><td class='bai'>".$row['bairro']."</td><td><button type='button' class='btn escolherEndereco'><i class='fas fa-check' style='font-size:16px;'>Escolher</i></button></td></tr>";
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