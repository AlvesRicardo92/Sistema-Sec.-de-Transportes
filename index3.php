
<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');

require "conexaoBanco.php";

$ano= DATE('Y');
$data_atual= DATE('Y-m-d');
$sql= "select count(ID) as total from SI where DATA between CAST('".$ano."-01-01' AS DATE) and CAST('".$data_atual."' AS DATE)";
$result = $mysqli->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
foreach($data as $row) {
    $total= $row['total'];
	}  
$result -> free_result();

$ano2= $ano-1;
$data_atual2= DATE($ano2.'-m-d');
$sql= "select count(ID) as total from SI where DATA between CAST('".$ano2."-01-01' AS DATE) and CAST('".$data_atual2."' AS DATE)";
$result = $mysqli->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
foreach($data as $row) {
    $total2= $row['total'];
	}  
$result -> free_result();

$porcentagem=$total2/$total;
echo var_dump($porcentagem);
exit();

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
                <h1 class="h2">Dashboard</h1>
                <p>This is the homepage of a simple admin interface which is part of a tutorial written on Themesberg</p>
                <div class="row my-4">
                    <div class="col-10 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Sol. Internas</h5>
                            <div class="card-body">
                              <h5 class="card-title"><?php echo $TOTAL ?></h5>
                              <p class="card-text"><?PHP echo $DATA_ATUAL?> </p>
                              <p class="card-text text-success">18.2% increase since last month</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-10 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Projetos</h5>
                            <div class="card-body">
                              <h5 class="card-title">445</h5>
                              <p class="card-text">Feb 1 - Apr 1</p>
                              <p class="card-text text-success">4.6% increase since last month</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-10 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Ordem de Serviços</h5>
                            <div class="card-body">
                              <h5 class="card-title">466</h5>
                              <p class="card-text">Feb 1 - Apr 1</p>
                              <p class="card-text text-danger">2.6% decrease since last month</p>
                            </div>
                          </div>
                    </div>
					<div class="col-10 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Carros Agendados</h5>
                            <div class="card-body">
                              <h5 class="card-title">DATE()</h5>
                              <p class="card-text">carro 01 - carro 02</p>
                              <p class="card-text">carro 03 - carro 04</p>
                            </div>
                          </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Ultimos Projetos</h5>
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
                                          <tr>
                                            <th scope="row">MO.12546/2023</th>
											<td>155/2023</td>
											<td>Fabio Rogerio Sartori</td>
                                            <td>466/2023</td>
                                            <td>Rua Giacomo Versolato, 150</td>
											<td>Centro</td>
                                            
											<td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">17370540</th>
											<td>15/05/2023</td>
                                            <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                            <td>jacob.monroe@company.com</td>
                                            <td>$153.11</td>
                                            <td>Aug 28 2020</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">17371705</th>
											<td>15/05/2023</td>
                                            <td>Volt Premium Bootstrap 5 Dashboard</td>
                                            <td>johndoe@gmail.com</td>
                                            <td>€61.11</td>
                                            <td>Aug 31 2020</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">17370540</th>
											<td>15/05/2023</td>
                                            <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                            <td>jacob.monroe@company.com</td>
                                            <td>$153.11</td>
                                            <td>Aug 28 2020</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">17371705</th>
											<td>15/05/2023</td>
                                            <td>Volt Premium Bootstrap 5 Dashboard</td>
                                            <td>johndoe@gmail.com</td>
                                            <td>€61.11</td>
                                            <td>Aug 31 2020</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">17370540</th>
											<td>15/05/2023</td>
                                            <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                            <td>jacob.monroe@company.com</td>
                                            <td>$153.11</td>
                                            <td>Aug 28 2020</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
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
