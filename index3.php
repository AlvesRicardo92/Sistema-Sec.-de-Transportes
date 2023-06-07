
<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');

require "conexaoBanco.php";

$ano= DATE('Y');
$data_atual= DATE('Y-m-d');
$sql= "select max(ID) as ultimo from SI where ano=$ano";
$result = $mysqli->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
foreach($data as $row) {
    $total= $row['ultimo'];
	}  
$result -> free_result();

//laço de repetição teste

			
			/*$teste=array(1,2,3,4,5,6);
			for($i = 0, $tamanho = count($teste); $i < $tamanho; ++$i) {
			
			$teste[$i] = $total;
			$total=$total-1;
			}*/
				//echo var_dump($teste[2]);
				//exit ();
				//$sql= "select (solicitante, id, funcionario) from SI where id=($teste[$i])";

?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php
    require "head.php"
    ?>
    <body>
        <?php
            require "menu.php"
        ?>
		<!-- Page content-->
		<!-- query para busca entre datas no banco select count(ID) as total from SI where DATA between CAST('2022-01-01' AS DATE) and CAST('2022-06-07' AS DATE);-->
		<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <h1 class="h2">Painel</h1>
                				
                <div class="row my-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card mb-4">
                            <h5 class="card-header text-center">Avisos</h5>
							<div class="card-body">
							<p class="lead">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.</p>
							</div>
                    </div>                    
                </div>
				
				<div class="row my-4" align="center">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Últimos Projetos</h5>
                            <div class="card-body">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Doc.</th>
												<th scope="col">Projeto</th>
												<th scope="col">Desenhista</th>
												<th scope="col">O.S.</th>
												<th scope="col">Endereço</th>
												<th scope="col">Bairro</th>
												<th scope="col"></th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$sql= "SELECT * FROM projeto where YEAR(DATA) = 2022 order by id desc limit 7";
											$result = $mysqli->query($sql);
											$data = $result->fetch_all(MYSQLI_ASSOC);
											foreach($data as $row) {
												echo "<tr>";
												echo "<th scope='row'>".$row['TIPODOC']." ".$row['NUMERODOC']."/".$row['DOCANO']."</th>";
												echo "<td>".$row['ID']."/".DATE('Y',strtotime($row['DATA']))."</td>";
												echo "<td>".$row['DESENHISTA']."</td>";
												echo "<td>O.S</td>";
												echo "<td>".$row['LOCAL']."</td>";
												echo "<td>".$row['BAIRRO']."</td>";
												echo "<td><a href='#' class='btn btn-sm btn-primary'>View</a></td>";
												echo "</tr>";
											}  
											$result -> free_result();
										?>
										</tbody>
									</table>
								</div>
							</div>
						</div>                    
					</div>
				</div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>
