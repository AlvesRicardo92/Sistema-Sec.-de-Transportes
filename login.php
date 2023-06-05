<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');


require "conexaoBanco.php";
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php
    require "head.php"
    ?>
    <body>
		<!-- Page content-->
		<div class="container">
			<section class="vh-100 gradient-custom">
			  <div class="container py-5 h-100">
				<div class="row d-flex justify-content-center align-items-center h-100">
				  <div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card bg-dark text-white" style="border-radius: 1rem;">
					  <div class="card-body p-5 text-center">

						<div class="mb-md-5 mt-md-4 pb-5">

						  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
						  <p class="text-white-50 mb-5">Por favor entre com o seu usuário e senha!</p>

						  <div class="form-outline form-white mb-4">
							<input type="email" id="typeEmailX" class="form-control form-control-lg" />
							<label class="form-label mt-1" for="typeEmailX">Usuário</label>
						  </div>

						  <div class="form-outline form-white mb-4">
							<input type="password" id="typePasswordX" class="form-control form-control-lg" />
							<label class="form-label mt-1" for="typePasswordX">Senha</label>
						  </div>

						  <button class="btn btn-outline-light btn-lg px-5" onclick="logar()">Login</button>

						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</section>
		</div>
		<?php
			//$mysqli->close();
		?>
    </body>
</html>
