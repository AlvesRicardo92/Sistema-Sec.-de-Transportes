
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
							<!--<p class="lead">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.</p>-->
							<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
								<div class="carousel-indicators">
									<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
									<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
									<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
								</div>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
										<div class="container">
											<div class="carousel-caption text-start">
												<h1>Example headline.</h1>
												<p>Some representative placeholder content for the first slide of the carousel.</p>
												<p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
											</div>
										</div>
									</div>
									<div class="carousel-item">
										<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
										<div class="container">
											<div class="carousel-caption">
												<h1>Another example headline.</h1>
												<p>Some representative placeholder content for the second slide of the carousel.</p>
												<p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
											</div>
										</div>
									</div>
									<div class="carousel-item">
										<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
										<div class="container">
											<div class="carousel-caption text-end">
												<h1>One more for good measure.</h1>
												<p>Some representative placeholder content for the third slide of this carousel.</p>
												<p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
											</div>
										</div>
									</div>
								</div>
								<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							</div>
						</div>
					</div>                    
				</div>
			</div>
			<div class="row my-4">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card mb-4">
						<h5 class="card-header" style="text-align:center">Últimos Projetos</h5>
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
												$sql2= "SELECT NUM_OS, ANO FROM os where PROJETO = '".$row['ID']."/".DATE('Y',strtotime($row['DATA']))."' limit 1";
												$result2 = $mysqli->query($sql2);
												$data2 = $result2->fetch_all(MYSQLI_ASSOC);
												$linhas = $result2 -> num_rows;
												if ($linhas>0){
													foreach($data2 as $row2) {
														echo "<td>".$row2['NUM_OS']."/".$row2['ANO']."</td>";
													}
												}
												else{
														echo "<td>Não encontrado</td>";
												}
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

		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
		<!-- Github buttons -->
		<script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>
