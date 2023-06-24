<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');

require "conexaoBanco.php";

$siNumero = $_COOKIE['numeroSI']; // Valor do tipo data
$siAno = $_COOKIE['anoSI'];

$sql= "SELECT * FROM SI where id = ".$siNumero." and ano=".$siAno;
$result = $mysqli->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
foreach($data as $row) {
  $interessado=$row['SOLICITANTE'];
  $projeto=$row['PROJETO'];
  $destino=$row['DESTINO'];
  $assunto=$row['ASSUNTO'];
  $obs=$row['OBS'];
  $logradouro=$row['LOGRADOURO'];
  $numeroEndereco=$row['NUMEROENDERECO'];
  $bairro=$row['BAIRRO'];
  $iniciais=$row['USUARIOCRIACAO'];
  $responsavel1=$row['RESP1'];
  $responsavel2=$row['RESP2'];
  $prioridade=$row['PRIORIDADE'];
  
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<?php
      require "head.php"
    ?>

<body>
    <?php
        //require "menu.php"
      ?>
    <style>
    @page {
        size: A3;
        margin: 0;
    }

    @media print {
        body {
            -webkit-print-color-adjust: exact;
        }

        #imprimir {
            display: none !important;
        }

        #voltar {
            display: none !important;
        }
    }
    </style>
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <?php
		if ($prioridade == 'URGENCIAR'){
			echo"<i style= 'font-size: 60px;' class='bi bi-1-circle'></i>";
		}
		else if ($prioridade == 'PRIORIZAR'){
			echo"<i style= 'font-size: 60px;' class='bi bi-2-circle'></i>";
		}
		else if ($prioridade == 'NORMAL'){
			echo"<i style= 'font-size: 60px;' class='bi bi-3-circle'></i>";
		}
		?>
        </div>
    </div>
    <div class="row">
        <img src="assets/brasao.png" style="width:8%;height:8%" class="rounded mx-auto d-block mt-3"
            alt="Brasão do Município de São Bernardo do Campo">
    </div>
    <div class="row">
        <p class="text-center mb-4">Município de São Bernardo do Campo<br>Secretaria de Transportes e vias
            públicas<br>Departamento de engenharia de trafego - ST-1
    </div>
    <div class="row mt-4 mb-4">
        <div class="col-md-2">
        </div>
        <div class="col-md-3">
            <span><strong>S.I. Nº: </strong><?php echo $siNumero."/".$siAno;?></span>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-2">
        </div>
        <div class="col-md-3">
            <span><strong>Interessado: </strong><?php echo $interessado;?></span>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-2">
            <span><strong>Destino: </strong><?php echo $destino;?></span>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-4 mb-5">
        <div class="col-md-10">
            <div class="border border-secondary border-2 px-4 py-2 text-center text-wrap" style="width:100%">
                <?php echo $assunto;?></div>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-10">
            Observações:
        </div>
    </div>
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-10">
            <div class="border border-secondary border-2 px-4 py-2 text-center text-wrap"
                style="width:100%; background-color:rgb(247, 217, 126)"><?php echo $obs;?></div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <span><strong>Local: </strong>
                <?php
              echo $logradouro;
              if($numeroEndereco!=""){
                echo ", ".$numeroEndereco;
              }
            ?></span>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <span><strong>Bairro: </strong><?php echo $bairro;?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="text-center mt-5">São Bernardo do Campo, <?php echo date('d/m/Y');?>
        </div>
    </div><br><br><br>
    <div class="row">
        <div class="col-md-12">
            <?php
			$sql= "SELECT * FROM login where nome_completo like '".$responsavel1."'";
			$result = $mysqli->query($sql);
			$data = $result->fetch_all(MYSQLI_ASSOC);
			foreach($data as $row) {
		    $funcao= $row['funcao'];
			}
			echo"<div class='text-center mt-5'><strong>".$responsavel1."</strong></div>";
			echo"</div>";
			echo"<div class='col-md-12'>";
			echo"<div class='text-center'>".$funcao."</div>";
			echo"</div>";
			
			
			if ($responsavel2!= "Selecione o ResponsÃ¡vel"){ 
				$sql= "SELECT * FROM login where nome_completo like '".$responsavel2."'";
				$result = $mysqli->query($sql);
				$data = $result->fetch_all(MYSQLI_ASSOC);
				foreach($data as $row) {
				$funcao= $row['funcao'];
				}
				echo"<div class='col-md-12'>";
				echo"<div class='text-center mt-5'><strong>".$responsavel2."</strong></div>";
				echo"</div>";
				echo"<div class='col-md-12'>";
				echo"<div class='text-center'>".$funcao."</div>";
				echo"</div>";
			}
		?>

        </div><br><br><br><br><br>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-9">
                <span><?php echo $iniciais;?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 mt-3 mb-5 text-center">
                <button type="button" id="imprimir" class="btn btn-primary" onclick="imprimirSI()">Imprimir</button>
                <button type="button" id="voltar" class="btn btn-primary"
                    onclick="window.location.href = 'si.php'">Voltar</button>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
            integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <?php
        //$mysqli->close();
        require "rodape.php"
      ?>
</body>

</html>