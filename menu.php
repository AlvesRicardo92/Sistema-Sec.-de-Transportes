<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');


require "conexaoBanco.php";
if($_SESSION["id"]==""){
	echo "Você não está logado!\nClique <a href='login.php'>aqui</a> para realizar o login";
	exit();
}
else{
	$sql = "SELECT nome_completo, Iniciais, depto FROM login WHERE identificacao=".$_SESSION["id"];
	$result = $mysqli->query($sql);
	$data = $result->fetch_all(MYSQLI_ASSOC);
	foreach($data as $row) {
		$nomeCompleto = $row['nome_completo'];
		$iniciais=$row['Iniciais'];
		$setor= $row['depto'];
	}  
	$result -> free_result();
}
?>
<div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline">Secretaria de Transportes<br> e Vias Públicas - SBC</span>
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="index3.php" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Início</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="si.php" class="nav-link align-middle px-0">
                                <i class="bi bi-clipboard2"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">SI</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="semaforica.php" class="nav-link align-middle px-0">
                                <i class="bi bi-stoplights"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Semafórica</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="carros.php" class="nav-link align-middle px-0">
                                <i class="bi bi-speedometer2"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Carros</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="projeto.php" class="nav-link align-middle px-0">
                                <i class="bi bi-cone-striped"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Projeto</span>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="" class="nav-link align-middle px-0">
                                <i class="bi bi-file-earmark-check"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Oficios</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link align-middle px-0">
                                <i class="bi bi-globe2"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Certidões</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link align-middle px-0">
                                <i class="bi bi-play-btn"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">O.S.</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link align-middle px-0">
                                <i class="bi bi-recycle"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Cont. de Implantações</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link align-middle px-0">
                                <i class="bi bi-pin-map-fill"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Radar e Estatistica</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link align-middle px-0">
                                <i class="bi bi-pencil"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Relatórios</span>
                                </a>
                            </li>                           
                        </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1"><?php echo "<font size=2>".$nomeCompleto."</font>"?></span>
						<span style="display:none"id="iniciais"><?php echo $iniciais?></span>
						<span style="display:none" id="setor"><?php echo $setor?></span> 
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">###</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="login.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>