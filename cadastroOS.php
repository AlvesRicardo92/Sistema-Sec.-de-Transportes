<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset', 'utf-8');

require "conexaoBanco.php";
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
    <div class="container col-md-10 mb-3">
        <h2 style="text-align: center;">Cadastro de Ordem de Serviço.</h2>

        <div class="row mt-5">
            <div class="row">

                <div class="col-md-10 mb-2">
                    <button type="button" class="btn btn-primary" onclick="gerarNovoSi()" id="novo">Novo</button>
                    <button type="button" class="btn btn-primary" id="pesquisar" data-bs-toggle="modal"
                        data-bs-target="#pesquisaSI">Sair</button>
                </div>

                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="prioridade" id="urgente" disabled>
                        <label class="form-check-label" for="urgente">
                            Urgente
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="prioridade" id="priorizar" disabled>
                        <label class="form-check-label" for="priorizar">
                            Prioridade
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="prioridade" id="normal" disabled>
                        <label class="form-check-label" for="normal">
                            Normal
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="diariaNumero" class="form-label">O.S. Nº</label>
                    <input type="text" class="form-control" id="projetoNumero" placeholder="Nº" disabled>
                </div>
                <div class="col-md-3">
                    <label for="diariaData" class="form-label">Data</label>
                    <input type="date" class="form-control" id="projetoData" disabled>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 mb-3">
                    <label for="diariaNumero" class="form-label">Funcionario</label>
                    <input type="text" class="form-control" id="projetoNumero" placeholder="Funcionario" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-floating col-md-2 mb-3">
                    <select class="form-select" style="height: 50% !important; " id="tipoDoc" aria-label="Veículo"
                        disabled>
                        <option value="0">Selecione</option>
                        <?php

                        $sql = "SELECT identificacao, nome_completo FROM login order by nome_completo";
                        $result = $mysqli->query($sql);
                        $data = $result->fetch_all(MYSQLI_ASSOC);
                        foreach ($data as $row) {
                            echo "<option value=" . $row['identificacao'] . ">" . utf8_encode($row['nome_completo']) . "</option>";
                        }
                        $result->free_result();
                        ?>

                    </select>
                    <label style="margin-left: 15%;" for="resp01">Documento</label>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" id="projetoNumero" disabled>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" id="projetoNumero" disabled>
                </div>
                <div class="col-md-3 mb-3">
                    <button type="button" class="btn btn-primary" id="pesquisar" data-bs-toggle="modal"
                        data-bs-target="#pesquisaDiaria">Buscar</button>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12 mb-3">
                    <label for="diariaNumero" class="form-label">Interessado</label>
                    <input type="text" class="form-control" id="projetoNumero" placeholder="Funcionario" disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="input-group">
                        <span class="input-group-text">Descrição</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-10 mb-3">
                    <label for="diariaNumero" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="projetoNumero" placeholder="Endereço" disabled>
                </div>


                <div class="col-md-2 mb-3">
                    <label for="diariaNumero" class="form-label">Nº</label>
                    <input type="text" class="form-control" id="projetoNumero" placeholder="Nº" disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 mb-3">
                    <label for="diariaNumero" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="projetoNumero" placeholder="Bairro" disabled>
                </div>

            </div>

            <div class="row">
                <div class="col-md-2 mb-3">
                    <label for="diariaNumero" class="form-label">Projeto</label>
                    <input type="text" class="form-control" id="projetoNumero" placeholder="Projeto" disabled>
                </div>

                <div class="col-md-10 mb-3">
                    <label for="diariaNumero" class="form-label">&nbsp;</label>
                    <input type="text" class="form-control" id="projetoNumero" disabled>
                </div>

            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <div style="margin-top: 3%; margin-left: 2%;" class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Sinalização Horizontal
                        </label>
                    </div>
                </div>

                <div class="col-md-3 mb-3">

                    <input type="text" class="form-control" id="projetoNumero" placeholder="Quente" disabled>
                </div>

                <div class="col-md-3 mb-3">

                    <input type="text" class="form-control" id="projetoNumero" placeholder="Fria" disabled>
                </div>

                <div class="col-md-3 mb-3">

                    <input type="text" class="form-control" id="projetoNumero" placeholder="Apagamento" disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <div style="margin-top: 3%; margin-left: 2%;" class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Sinalização Vertical
                        </label>
                    </div>
                </div>

                <div class="col-md-3 mb-3">

                    <input type="text" class="form-control" id="projetoNumero" placeholder="Quente" disabled>
                </div>

                <div class="col-md-3 mb-3">
                    <div style="margin-top: 3%; margin-left: 2%;" class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Placa Vertical
                        </label>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <div style="margin-top: 3%; margin-left: 2%;" class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Geometrico
                        </label>
                    </div>
                </div>

                <div class="col-md-3 mb-3">

                    <input type="text" class="form-control" id="projetoNumero" placeholder="Quente" disabled>
                </div>

                <div class="col-md-3 mb-3">
                    <div style="margin-top: 3%; margin-left: 2%;" class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Semaforica
                        </label>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="input-group">
                        <span class="input-group-text">Observação</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div style="text-align: center;">

                    <button type="button" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-primary">Pesquisar</button>
                    <button type="button" class="btn btn-primary">Imprimir</button>

                </div>
            </div>



            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous">
                </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
                integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
                crossorigin="anonymous">
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