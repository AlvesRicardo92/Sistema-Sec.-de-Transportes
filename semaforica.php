<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');
# Substitua abaixo os dados, de acordo com o banco criado
$user = "root"; 
$password = ""; 
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
    <?php
    require "head.php"
    ?>
    <body>
        <?php
            require "menu.php"
        ?>
        <!-- Page content-->
        <div class="container">
            <form action="/teste.php" method="post" id="formulario" name="formulario">
                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-10 mb-2">
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
                    <div class="row">
                        <div class="form-floating col-md-7 mt-3 mb-3">
                            <select class="form-select" id="origem" aria-label="Origem" disabled>
                            <option value="0">Selecione a origem</option>
                            <?php
                                $sql = "SELECT * FROM origem WHERE desativado =0 order by descricao";
                                $result = $mysqli->query($sql);
                                $data = $result->fetch_all(MYSQLI_ASSOC);
                                foreach($data as $row) {
                                    echo "<option value=".$row['id'].">".utf8_encode($row['descricao'])."</option>";
                                }  
                                $result -> free_result();  
                            ?>
                            </select>
                            <label for="origem">Origem da ocorrência</label>
                        </div>
                        <div class="col-md-3">
                            <label for="numTalao" class="form-label">Nº Talão</label>
                            <input type="text" class="form-control" id="numTalao" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="responsavel" class="form-label">Responsável pelo cadastro da Diária</label>
                            <input type="text" class="form-control" id="responsavel" placeholder="Nome do funcionário que está cadastrando a Diária" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <button type="button" class="btn btn-primary" id="buscaEndereco" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="passaChamada('L1')" disabled>Digitar endereço</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="logradouro" class="form-label">Logradouro</label>
                            <input type="text" class="form-control" id="logradouro" placeholder="Logradouro" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" placeholder="Bairro" disabled>
                        </div>
                        <div class="col-md-2">
                            <label for="numEndereco" class="form-label">Nº</label>
                            <input type="text" class="form-control" id="numEndereco" placeholder="Número" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" style="margin-top:25px;" id="buscaEnderecoCruzamento" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="passaChamada('L2')" disabled>Digitar cruzamento</button>
                        </div>
                        <div class="col-md-8">
                            <label for="logradouroCruzamento" class="form-label">Logradouro do Cruzamento</label>
                            <input type="text" class="form-control" id="logradouroCruzamento" placeholder="Logradouro do Cruzamento" disabled>
                        </div>
                    </div>
                    <div class="row mb-3 mt-2">
                        <div class="form-floating col-md-10">
                            <textarea class="form-control" id="ocorrencia" placeholder="&nbsp;&nbsp;Descrição da ocorrência" style="height: 100px;resize: none;" disabled></textarea>
                            <label for="ocorrencia">&nbsp;&nbsp;Descrição/Histórico da ocorrência</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating col-md-5 mb-3">
                            <select class="form-select" id="tipoServico" aria-label="Tipo Serviço" disabled>
                                <option value="0" selected>Selecione o tipo de serviço</option>
                                <?php
                                    $sql = "SELECT * FROM tiposervico WHERE desativado =0 order by descricao";
                                    $result = $mysqli->query($sql);
                                    $data = $result->fetch_all(MYSQLI_ASSOC);
                                    foreach($data as $row) {
                                        echo "<option value=".$row['id'].">".utf8_encode($row['descricao'])."</option>";
                                    }  
                                    $result -> free_result();  
                                ?>
                            </select>
                            <label for="tipoServico">Tipo Serviço</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating col-md-9">
                            <select class="form-select" id="tipoAtividade" aria-label="Atividade executada" disabled>
                                <option value="0" selected>Selecione a atividade executada</option>
                                <?php
                                    $sql = "SELECT * FROM tipoatividade WHERE desativado =0 order by descricao";
                                    $result = $mysqli->query($sql);
                                    $data = $result->fetch_all(MYSQLI_ASSOC);
                                    foreach($data as $row) {
                                        echo "<option value=".$row['id'].">".utf8_encode($row['descricao'])."</option>";
                                    }  
                                    $result -> free_result();  
                                ?>
                            </select>
                            <label for="tipoAtividade">Atividade executada</label>
                        </div>
                        <div class="col-md-1 mt-2">
                        <button class="btn btn-primary" type="button" id="incluirNaLista" style="border-top-right-radius: 0.3rem;border-bottom-right-radius: 0.3rem;" onclick="inserirLinhaTabela(document.getElementById('tipoAtividade').selectedOptions[0].innerText)" disabled>Incluir</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mt-3">
                            <table class="table table-primary table-striped" id="tabelaAtividade">
                                <tbody>
                                <!--<tr>
                                    <td class="align-middle">Descrição do serviço adicionado</td>
                                    <td><button type="button" class="btn" onclick="removerLinha()"><i class="fas fa-trash" style="font-size:16px;"> Excluir</i></button></td>
                                </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating col-md-4 mb-3">
                            <select class="form-select" id="tipoMaterial" aria-label="Material utilizado" disabled>
                                <option value="0" selected>Selecione o material utilizado</option>
                                <?php
                                    $sql = "SELECT * FROM material WHERE desativado =0 order by descricao";
                                    $result = $mysqli->query($sql);
                                    $data = $result->fetch_all(MYSQLI_ASSOC);
                                    foreach($data as $row) {
                                        echo "<option value=".$row['id'].">".utf8_encode($row['descricao'])."</option>";
                                    }  
                                    $result -> free_result();  
                                ?>
                            </select>
                            <label for="tipoMaterial">Material utilizado</label>
                        </div>
                        <div class="col-md-2 mb-3" style="padding-top:9px;">
                            <input type="text" class="form-control" placeholder="Quantidade" aria-label="Quantidade" aria-describedby="incluirNaListaMaterial" id="quantidadeMaterial" disabled>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div style="padding-top:15px;">&nbsp;&nbsp;
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="origemMaterial" id="retirada" value="Retirada" disabled>
                                    <label class="form-check-label" for="retirada">Retirada</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="origemMaterial" id="pmsbc" value="PMSBC" disabled>
                                    <label class="form-check-label" for="pmsbc">PMSBC</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="origemMaterial" id="consorcio" value="Consórcio" disabled>
                                    <label class="form-check-label" for="consorcio">Consórcio</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 mt-2">
                            <button class="btn btn-primary" type="button" id="incluirNaListaMaterial" style="border-top-right-radius: 0.3rem;border-bottom-right-radius: 0.3rem;" onclick="inserirLinhaTabelaMaterial(document.getElementById('tipoMaterial').selectedOptions[0].innerText,document.getElementById('quantidadeMaterial').value)" disabled>Incluir</button>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-10 mt-3">
                            <table class="table table-success table-striped" id="tabelaMaterial">
                                <tbody>
                                <!--<tr>
                                    <td class="align-middle">Descrição do serviço adicionado</td>
                                    <td><button type="button" class="btn" onclick="removerLinha()"><i class="fas fa-trash" style="font-size:16px;"> Excluir</i></button></td>
                                </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="horaRecebeu" class="form-label">Horário que recebeu o serviço</label>
                            <input type="time" class="form-control" id="horaRecebeu" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="horaChegou" class="form-label">Horário que chegou ao local</label>
                            <input type="time" class="form-control" id="horaChegou" disabled>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                            <label for="horaInicio" class="form-label">Horário que iniciou o serviço</label>
                            <input type="time" class="form-control" id="horaInicio" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="horaFim" class="form-label">Horário que terminou o serviço</label>
                            <input type="time" class="form-control" id="horaFim" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating col-md-4 mt-3 mb-3">
                            <select class="form-select" id="veiculo" aria-label="veiculo" disabled>
                                <option value="0">Selecione o veículo</option>
                                <?php 
                                    $sql = "select id,CONCAT(modelo, ' ',placa) as carro from veiculo order by carro";
                                    $result = $mysqli->query($sql);
                                    $data = $result->fetch_all(MYSQLI_ASSOC);
                                    foreach($data as $row) {
                                        echo "<option value=".$row['id'].">".utf8_encode($row['carro'])."</option>";
                                    }  
                                    $result -> free_result();    
                                ?>
                            </select>
                            <label for="veiculo">Veículo</label>
                        </div>
                        <div class="col-md-3">
                            <label for="kmInicial" class="form-label">KM Inicial</label>
                            <input type="text" class="form-control" id="kmInicial" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="kmFinal" class="form-label">KM Final</label>
                            <input type="text" class="form-control" id="kmFinal" disabled>
                        </div>
                    </div>
                    <div class="row mb-3 mt-2">
                        <div class="form-floating col-md-10">
                            <textarea class="form-control" id="obs" placeholder="&nbsp;&nbsp;Observações" style="height: 100px;resize: none;" disabled></textarea>
                            <label for="obs">&nbsp;&nbsp;Observações</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mt-3 mb-5 text-center">
                            <button type="button" id="salvar" class="btn btn-primary" onclick="enviarForm()" disabled>Salvar</button>
                            <button type="button" id="voltar" class="btn btn-primary">Voltar</button>
                        </div>
                    </div>
                </div>
            </form>
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
