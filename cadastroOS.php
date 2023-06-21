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
                <label style="margin-left: 35%;" for="resp01">Documento</label>
            </div>
            <div class="col-md-3 mb-3">
                <input type="text" class="form-control" id="projetoNumero" disabled>
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