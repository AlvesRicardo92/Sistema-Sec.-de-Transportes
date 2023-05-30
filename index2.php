<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');
# Substitua abaixo os dados, de acordo com o banco criado
$user = "root"; 
$password = "root"; 
$database = "teste_semaforica"; 

# O hostname deve ser sempre localhost 
$hostname = "localhost"; 

$mysqli = new mysqli($hostname,$user,$password,$database);
// Checar conexão
if ($mysqli -> connect_errno) {
  echo "Falha ao conectar ao banco: " . $mysqli -> connect_error;
  exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Título</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!--<link rel="stylesheet" href="css/font-awesome.min.css">-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
        <!--<link href="css/font-awesome-all.min.css" rel="stylesheet" />-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--<script src="js/jquery.min.js"></script>-->
    </head>
    <body>
        
        <!-- Page content-->
        <div class="container">
            <div class="center-block" style="background-color:red; width:300px;height:300px">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <button type="button" class="btn btn-primary" onclick="gerarNovo()" id="novo" disabled>Novo</button>
                        <button type="button" class="btn btn-primary" id="pesquisar" data-bs-toggle="modal" data-bs-target="#pesquisaDiaria" disabled>Pesquisar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="diariaNumero" class="form-label">Diária nº</label>
                        <input type="text" class="form-control" id="diariaNumero" placeholder="Nº da Diária" disabled>
                    </div>
                    <div class="col-md-3">
                        <label for="diariaData" class="form-label">Data</label>
                        <input type="date" class="form-control" id="diariaData" disabled>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL do ENDEREÇO-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
         <!--<script src="js/bootstrap.bundle.min.js"></script>-->
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Localize o endereço</h4><span id="chamada" style="display:none"></span>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-floating col-md-8 mb-2">
                                <select class="form-select" id="tipoLogradouro" aria-label="Tipo Logradouro">
                                    <!--<option selected>Open this select menu</option>-->
                                    <option value="0">Selecione o tipo do logradouro</option>
                                    <?php
                                        $sql = "SELECT * FROM tipologradouro WHERE desativado =0 order by descricao";
                                        $result = $mysqli->query($sql);
                                        $data = $result->fetch_all(MYSQLI_ASSOC);
                                        foreach($data as $row) {
                                            echo "<option value=".$row['id'].">".utf8_encode($row['descricao'])."</option>";
                                        }  
                                        $result -> free_result();  
                                    ?>
                                </select>
                                <label for="tipoMaterial">Tipo Logradouro</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-2" style="padding-top:9px;">
                                <input type="text" class="form-control" placeholder="Endereço" aria-label="Endereço" aria-describedby="pesquisarEndereco" id="endereco">
                            </div>
                            <div class="col-md-1 mt-2">
                                <button class="btn btn-primary mb-2" type="button" id="pesquisarEndereco" style="border-top-right-radius: 0.3rem;border-bottom-right-radius: 0.3rem;" onclick="buscarEndereco(document.getElementById('endereco').value)">Pesquisar</button>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2" style="max-height:250px;height:250px;border: 1px solid #ced4da;overflow: auto;">
                                <table class="table table-hover" id="tabelaResultadoEndereco">
                                    <tbody>
                                    <!--<tr>
                                        <td class="align-middle">Descrição do serviço adicionado</td>
                                        <td><button type="button" class="btn" onclick="removerLinha()"><i class="fas fa-trash" style="font-size:16px;"> Excluir</i></button></td>
                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="fecharModal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL da PESQUISA-->
        <div class="modal fade" id="pesquisaDiaria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pesquisaDiariaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="pesquisaDiariaLabel">Pesquisa de diária</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoPesquisa" id="numeroPesquisa" value="Número">
                                <label class="form-check-label" for="numeroPesquisa">Número</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoPesquisa" id="enderecoPesquisa" value="Endereço">
                                <label class="form-check-label" for="enderecoPesquisa">Endereço</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoPesquisa" id="funcionarioPesquisa" value="Funcionário">
                                <label class="form-check-label" for="funcionarioPesquisa">Funcionário</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-2" style="padding-top:9px;">
                                <input type="text" class="form-control" placeholder="Digite o que deseja buscar" aria-label="busca" aria-describedby="buscaDocumento" id="textoBusca">
                            </div>
                            <div class="col-md-1 mt-2">
                                <button class="btn btn-primary mb-2" type="button" id="pesquisarDiaria" style="border-top-right-radius: 0.3rem;border-bottom-right-radius: 0.3rem;" onclick="buscarDiaria(document.getElementById('textoBusca').value)">Pesquisar</button>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2" style="max-height:250px;height:250px;border: 1px solid #ced4da;overflow: auto;">
                                <table class="table table-hover" id="tabelaResultadoDiaria">
                                    <tbody>
                                    <!--<tr>
                                        <td class="align-middle">Descrição do serviço adicionado</td>
                                        <td><button type="button" class="btn" onclick="removerLinha()"><i class="fas fa-trash" style="font-size:16px;"> Excluir</i></button></td>
                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="fecharModalPesquisa">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $mysqli->close();
        ?>
    </body>
</html>
