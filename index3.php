<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');

require "conexaoBanco.php";

$ano= DATE('Y');
$data_atual= DATE('Y-m-d');
/*$sql= "select max(ID) as ultimo from SI where ano=$ano";
$resultado = $mysqli->query($sql);
$data = $resultado->fetch_assoc();
foreach($data as $row) {
    $total= $row['ultimo'];
	}  
$resultado -> free_result();*/
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
        <h1 class="h2">Painelmmmmmmmm</h1>
        <div class="row my-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card mb-4">
                    <h5 class="card-header text-center">Avisos</h5>
                    <div class="card-body">
                        <!--<p class="lead">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.</p>-->
                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                                    aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3"
                                    aria-label="Slide 4"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active" style="height:300px">
                                    <svg class="bd-placeholder-img" width="100%" height="100%"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <rect width="100%" height="100%" fill="#333" />
                                    </svg>
                                    <div class="container">
                                        <div class="carousel-caption text-justify">
                                            <!-- Alinhamento do conteúdo do slide à esquerda text-start, justificado é text-justify -->
                                            <h3>Entrega de IRPF</h3>
                                            <p>Some representative placeholder content for the first slide of the
                                                carousel.Some representative placeholder content for the first slide of
                                                the carousel.of the carousel.Some representative placeholder content for
                                                the first slide of the carousel.Some representative placeholder content
                                                for the first slide of the carousel.Some representative placeholder
                                                content for the first slide of the carousel.of the carousel.Some
                                                representative placeholder content for the first slide of the
                                                carousel.Some representative placeholder content for the first slide of
                                                the carousel.Some representative placeholder content for the first slide
                                                of the carousel.of the carousel.Some representative placeholder content
                                                for the first slide of the carousel.Some representative placeholder
                                                content for the first slide of the carousel.Some representative
                                                placeholder content for the first slide of the carousel.of the
                                                carousel.Some representative placeholder content for the first slide of
                                                the carousel.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item" style="height:300px">
                                    <svg class="bd-placeholder-img" width="100%" height="100%"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <rect width="100%" height="100%" fill="#555" />
                                    </svg>
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <!-- Alinhamento do conteúdo do slide centralizado sem qualquer classe text-xxx -->
                                            <h1>Another example headline.</h1>
                                            <p>Some representative placeholder content for the second slide of the
                                                carousel.</p>
                                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item" style="height:300px">
                                    <svg class="bd-placeholder-img" width="100%" height="100%"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <rect width="100%" height="100%" fill="#777" />
                                    </svg>
                                    <div class="container">
                                        <div class="carousel-caption text-end">
                                            <!-- Alinhamento do conteúdo do slide à direita text-end -->
                                            <h1>One more for good measure.</h1>
                                            <p>Some representative placeholder content for the third slide of this
                                                carousel.</p>
                                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item" style="height:300px">
                                    <svg class="bd-placeholder-img" width="100%" height="100%"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <rect width="100%" height="100%" fill="#af1" />
                                    </svg>
                                    <div class="container">
                                        <div class="carousel-caption text-end">
                                            <h1>quarto slide</h1>
                                            <p>Some representative placeholder content for the third slide of this
                                                carousel.Some representative placeholder content for the third slide of
                                                this carousel.Some representative placeholder content for the third
                                                slide of this carousel.</p>
                                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                data-bs-slide="next">
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
											$sql= "SELECT * FROM projeto where YEAR(DATA) = ? order by id desc limit 5";
                                            $stmt = $mysqli->prepare($sql);
                                            $ano = 2022;
                                            $stmt->bind_param("i", $ano);
                                            if($stmt->execute()){
                                                $resultado = $stmt->get_result();
                                                while($row = $resultado->fetch_assoc()) { 
                                                    echo "<tr>";
                                                    echo "<th scope='row'>".$row['TIPODOC']." ".$row['NUMERODOC']."/".$row['DOCANO']."</th>";
                                                    echo "<td>".$row['ID']."/".DATE('Y',strtotime($row['DATA']))."</td>";
                                                    echo "<td>".$row['DESENHISTA']."</td>";
                                                    $sql2= "SELECT NUM_OS, ANO FROM os where PROJETO = ? limit 1";
                                                    $stmt2 = $mysqli->prepare($sql2);
                                                    $projeto = $row['ID'] . "/" . date('Y', strtotime($row['DATA']));
                                                    $stmt2->bind_param("s", $projeto);
                                                    $stmt2->execute();

                                                    $resultado2 = $stmt2->get_result();
                                                    $linhas = $resultado2->num_rows;
                                                    if ($linhas > 0) {
                                                        while ($row2 = $resultado2->fetch_assoc()) {
                                                            echo "<td>" . $row2['NUM_OS'] . "/" . $row2['ANO'] . "</td>";
                                                        }
                                                    } else {
                                                        echo "<td>Não encontrado</td>";
                                                    }
                                                
                                                    echo "<td>" . $row['LOCAL'] . "</td>";
                                                    echo "<td>" . $row['BAIRRO'] . "</td>";
                                                    echo "<td><a href='#' class='btn btn-sm btn-primary'>View</a></td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            
                                            
                                            $resultado->free_result();
                                            $resultado2->free_result();
                                            $stmt->close();
                                            $stmt2->close();
										?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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