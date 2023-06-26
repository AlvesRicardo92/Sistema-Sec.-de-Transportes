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
    
    if(!isset($_POST["endereco"])){
        echo "erro sem endereço";
        exit;
    }
    else{
        $endereco = $mysqli -> real_escape_string($_POST["endereco"]);
        $data = date("Y-m-d");
        $hora=date("H:i:s");
        $tabela="";
        $linhas = 0;

        $sql = "SELECT * FROM logradouro WHERE nomeLogradouro like ?";
        $stmt = $mysqli->prepare($sql);
        $endereco = "%" . $endereco . "%";
        $stmt->bind_param('s', $endereco);

        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            $linhas = $resultado -> num_rows;
            $contador=1;
            if($linhas>0){ 
                while($row = $resultado->fetch_assoc()) {
                    $tabela= $tabela . "<tr id='".$contador."' style='width:0px;'><td class='end'>".$row['nomeLogradouro']."</td><td class='bai'>".$row['bairro']."</td><td><button type='button' class='btn escolherEndereco'><i class='fas fa-check' style='font-size:16px;'>Escolher</i></button></td></tr>";
                    $contador++;
                }
                $resultado -> free_result();
                $stmt->close();
                echo $tabela;
            }
            else{
                $resultado -> free_result();
                $stmt->close();
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