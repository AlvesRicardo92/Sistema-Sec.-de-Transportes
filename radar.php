<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');


require "conexaoBanco.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php
    require "head.php"
    ?>
    <body>
        <?php
            require "menu3.php"
        ?>
        <div class="container col-md-10" id="container">
        <h2>Projetos</h2>
            <form action="" method="post" id="formulario" name="formulario">
                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <button type="button" class="btn btn-primary" onclick="gerarNovoProj()" id="novo" >Novo</button>
                            <button type="button" class="btn btn-primary" id="pesquisar"  data-bs-toggle="modal" data-bs-target="#pesquisaDiaria">Pesquisar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="diariaNumero" class="form-label">Projeto Nº</label>
                            <input type="text" class="form-control" id="projetoNumero" placeholder="Nº" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="diariaData" class="form-label">Data</label>
                            <input type="date" class="form-control" id="projetoData" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating col-md-12 mt-3 mb-3">
                            <select class="form-select" id="desenhista" aria-label="Desenhista" disabled>
                            <option value="0">Desenhista</option>
                           
                            <?php
                            
                                $sql = "SELECT identificacao, nome_completo FROM login where acesso=3 order by nome_completo";
                                $result = $mysqli->query($sql);
                                $data = $result->fetch_all(MYSQLI_ASSOC);
                                foreach($data as $row) {
                                    echo "<option value=".$row['identificacao'].">".utf8_encode($row['nome_completo'])."</option>";
                                }  
                                $result -> free_result();    
                            ?>
                            
                            </select>
                            <label for="desenhista">Desenhista</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-floating col-md-3 mt-3 mb-3">
                            <select class="form-select" id="tipoDoc" aria-label="Tipo Doc." disabled>
                            <option value="0">Selecione tipo Doc</option>
                           
                            <?php
                                $sql = "SELECT idUnidade, nomeUnidade FROM unidades where nomeUnidade not like '-' order by nomeUnidade desc";
                                $result = $mysqli->query($sql);
                                $data = $result->fetch_all(MYSQLI_ASSOC);
                                foreach($data as $row) {
                                    echo "<option value=".$row['idUnidade'].">".utf8_encode($row['nomeUnidade'])."</option>";
                                }  
                                $result -> free_result();
                            ?>
                            
                            </select>
                            <label for="tipoDoc">Tipo de Documento</label>
						</div>
							<div class="col-md-3  mb-3">
                            <label for="numDoc" class="form-label">Nº Documento</label>
                            <input type="text" class="form-control" id="numDoc" placeholder="Nº Documento" disabled>
							</div>
							<div class="col-md-2  mb-3">
                            <label for="docAno" class="form-label">Ano</label>
                            <input type="text" class="form-control" id="docAno" placeholder="Ano" disabled>
							</div>
							<div class="col-md-2  mb-3 mt-4">
                            <button type="button" class="btn btn-primary mt-2" id="buscaDoc" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="passaChamada('L1')" disabled>Buscar Doc</button>
							</div>
                    </div>
                </div>
                    
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary" id="buscaEndereco" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="passaChamada('L1')" disabled>Buscar endereço</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <label for="logradouro" class="form-label">Logradouro</label>
                            <input type="text" class="form-control" id="logradouro" placeholder="Logradouro" disabled>
                        </div>
                       
                        <div class="col-md-2">
                            <label for="numEndereco" class="form-label">Nº</label>
                            <input type="text" class="form-control" id="numEndereco" placeholder="Número" disabled>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" placeholder="Bairro" disabled>
                        </div>
                    </div>   
						<div class="row">
							<div class="col-md-3 mt-3">
								<div class="form-check">
									<input class="form-check-input mt-3" type="checkbox" value="" id="sinHorizontal">
									<label class="form-check-label mt-3" for="sinHorizontal">
									Sinalização Horizontal
									</label>
								</div>
							</div>
							<div class="col-md-3 mt-3">
								<label class="form-check-label" for="qtdeFria">Fria </label>
								<input type="text" class="form-control" id="qtdeFria" placeholder="Fria" disabled>
							</div>
							<div class="col-md-3 mt-3">
								<label class="form-check-label" for="qtdeQuente">Quente </label>
								<input type="text" class="form-control" id="qtdeQuente" placeholder="Quente" disabled>
							</div>
							<div class="col-md-3 mt-3">
								<label class="form-check-label" for="qtdeApagamento">Apagamento </label>
								<input type="text" class="form-control" id="qtdeApagamento" placeholder="Apagamento" disabled>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 mt-3">
								<div class="form-check">
									<input class="form-check-input mt-3" type="checkbox" value="" id="sinVertical">
									<label class="form-check-label mt-3" for="sinVertical">
									Sinalização Vertical
									</label>
								</div>
							</div>
							<div class="col-md-3 mt-3">
								<label class="form-check-label" for="qtdePlacas">Placas </label>
								<input type="text" class="form-control" id="qtdePlacas" placeholder="Placas" disabled>
							</div>
							<div class="col-md-3 mt-3">
								<label class="form-check-label" for="qtdePostes">Postes </label>
								<input type="text" class="form-control" id="qtdePostes" placeholder="Postes" disabled>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 mt-3">
								<div class="form-check">
									<input class="form-check-input mt-3" type="checkbox" value="" id="Geo">
									<label class="form-check-label mt-3" for="Geo">
									Geométrico
									</label>
								</div>
							</div>
							<div class="col-md-3 mt-3">
								<label class="form-check-label" for="qtdeGeometrico">Geométrico </label>
								<input type="text" class="form-control" id="qtdeGeometrico" placeholder="Geométrico" disabled>
							</div>
						</div>
						<div class="row mb-5">
							<div class="col-md-3 mt-3">
								<div class="form-check">
									<input class="form-check-input mt-3" type="checkbox" value="" id="Disp">
									<label class="form-check-label mt-3" for="Disp">
									Dispositivos
									</label>
								</div>
							</div>
							<div class="col-md-3 mt-3">
								<label class="form-check-label" for="qtdeDispositivos">Dispositivos </label>
								<input type="text" class="form-control" id="qtdeDispositivos" placeholder="Dispositivos" disabled>
							</div>
						</div>
					
					
					
                    <div class="row mb-3 mt-3">
                        <div class="form-floating col-md-12">
                            <textarea class="form-control" id="obs" placeholder="&nbsp;&nbsp;Observações" style="height: 100px;resize: none;" disabled></textarea>
                            <label for="obs">&nbsp;&nbsp;Observações</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-5 text-center">
                            <button type="button" id="salvar" class="btn btn-primary" onclick="enviarSI()" disabled>Salvar</button>
                            
                            <button type="button" id="voltar" class="btn btn-primary" onclick="voltarPaginaInicial()" >Voltar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
            //$mysqli->close();
            require "rodape.php"
        ?>
    </body>
</html>