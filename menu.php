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
		<div class="col-2 col-md-2 col-xl-2 px-sm-2 px-0 bg-dark">
			<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
				<a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
					<span class="fs-5 d-none d-sm-inline">Secretaria de Transportes<br> e Vias Públicas - SBC</span>
				</a>
				<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
					<li class="nav-item">
						<a href="index3.php" class="nav-link align-middle px-0">
							<i class="bi-4 bi-house"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Início</span>
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
						<a href="oficio.php" class="nav-link align-middle px-0">
							<i class="bi bi-file-earmark-check"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Oficios</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="certidoes.php" class="nav-link align-middle px-0">
							<i class="bi bi-globe2"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Certidões</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="" class="nav-link align-middle px-0">
							<i class="bi bi-play-btn"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">O.S.</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="controleOS.php" class="nav-link align-middle px-0">
							<i class="bi bi-amd"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Controle de O.S.</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="" class="nav-link align-middle px-0">
							<i class="bi bi-recycle"></i>&nbsp;&nbsp;<span class="ms-1 d-none d-sm-inline">Cont. de Implantações</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="radar.php" class="nav-link align-middle px-0">
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
				<div class="pb-4 fixed-bottom ml-3">
					
						<span class="d-none d-sm-inline mx-1"><?php echo "<font size=2>".$nomeCompleto."</font>"?></span>
						<span style="display:none"id="iniciais"><?php echo $iniciais?></span>
						<span style="display:none" id="setor"><?php echo $setor?></span>
					
					<p style="font-size: 10px">Desenvolvido por:<br>Ricardo de Barros<br>Fabio Sartori<br>Pedro Domingues</p>
				
				</div>
			</div>
		</div>
	