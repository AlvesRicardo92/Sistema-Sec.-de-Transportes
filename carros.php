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
        <h2 style="text-align: center;">Agendamento de Veículos</h2>
        <div class="row mt-5">
            <div class="col-md-1" style="margin-top: 3%; margin-left: -1%;">
                <button type="button" class="btn btn-primary float-end">
                    << </button>
            </div>
            <div class="col-md-2 mb-3">
                <label for="dataCarros" class="form-label">Data do Agendamento</label>
                <input type="date" class="form-control" id="dataCarros" disabled>
            </div>
            
            <div class="col-md-1" style="margin-top: 3%;">
                <button type="button" class="btn btn-primary"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">>></button>
            </div>
			
                <div class="col-md-8 mb-3" style="margin-top: 3%">
					<button type="button" class="btn btn-primary" >Novo</button>
					<button type="button" class="btn btn-primary">Agendar/Salvar</button>
					<button type="button" class="btn btn-primary">Cancelar Agend.</button>
					<button type="button" class="btn btn-primary">Sair</button>
                </div>
            
        </div>
        <div class="row">
            <div class="form-floating col-md-6 mb-3">
                <select class="form-select" id="resp01" aria-label="Veículo" disabled>
                    <option value="0">Selecione o Veiculo</option>
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
                <label style="margin-left: 35%;" for="resp01">Veículo</label>
            </div>
            <div class="form-floating col-md-6 mb-3">
                <select style="margin-left: -5%;" class="form-select" id="resp01" aria-label="Horário" disabled>
                    <option value="0">Selecione o Horário</option>
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
                <label style="margin-left: 35%;" for="resp01">Horário</label>
            </div>
        </div>
        <div class="row">

            <div class="mb-3" style="text-align: center;"> Última Atualização</div>
            <div style="margin-left: 10%;" class="col-md-3 mb-3">
                <div class="input-group input-group-sm mb-3">
                    <label for="diariaText" class="form-label">&nbsp;</label>
                    <span class="input-group-text" id="inputGroup-sizing-sm">Motorista</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm">

                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Quilometragem</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="input-group input-group-sm mb-3">
                    <label for="diariaText" class="form-label">&nbsp;</label>
                    <span class="input-group-text" id="inputGroup-sizing-sm">Combustível</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
        </div>
        <div class="row">
            <div style="margin-left: 10%;" class="col-md-3 mb-3">
                <div class="input-group input-group-sm mb-3">
                    <label for="diariaText" class="form-label">&nbsp;</label>
                    <span class="input-group-text" id="inputGroup-sizing-sm">KM Inicial</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="input-group input-group-sm mb-3">
                    <label for="diariaText" class="form-label">&nbsp;</label>
                    <span class="input-group-text" id="inputGroup-sizing-sm">KM Final</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
            <div  class="col-md-3 mb-3">
                <div class="input-group input-group-sm mb-3">
                    <label for="diariaText" class="form-label">&nbsp;</label>

                    <select class="form-select" aria-label="Default select example">
                        <option selected>Combustível</option>
                        <option value="1">Reserva</option>
                        <option value="2">1/8</option>
                        <option value="3">1/4</option>
                        <option value="4">3/8</option>
                        <option value="5">2/4</option>
                        <option value="6">5/8</option>
                        <option value="7">3/4</option>
                        <option value="8">7/8</option>
                        <option value="9">4/4</option>

                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div style="margin-left: 15%;"  class="col-md-2 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Abastecido?
                    </label>
                </div>
            </div>

            <div class="col-md-3 mb-3" style="margin-left: -3%;">
                <input style="width: 50%;" type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm" placeholder="KM">

            </div>
            <div class="col-md-3 mb-3" style="margin-left: -8%;">
                <input style="width: 50%;" type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm" placeholder="Litros">
            </div>
            <div class="col-md-3 mb-3" style="margin-left: -10%;">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Necessita de Lavagem?
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div  class="input-group">
                        <span class="input-group-text">Destino</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div  class="input-group">
                        <span class="input-group-text">Observação</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-1 mb-3">
                    <label for="formFileMultiple" class="form-label">Anexo</label>
                </div>
                <div class="col-md-12 mb-3">

                    <input  class="form-control" type="file" id="formFileMultiple"
                        multiple>
                </div>
            </div>

            <div class="row">
                <div style="text-align: center;">
                    <button type="button" class="btn btn-primary">Novo</button>
                    <button type="button" class="btn btn-primary">Agendar/Salvar</button>
                    <button type="button" class="btn btn-primary">Cancelar Agendamento</button>
                    <button type="button" class="btn btn-primary">Sair</button>
                </div>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
            integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <?php
            //$mysqli->close();
            require "rodape.php"
        ?>
</body>

</html>