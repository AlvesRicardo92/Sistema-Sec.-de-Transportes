
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
          require "menu.php"
      ?>
      <div class="container">
        <h2>Agendamento de Veículos</h2>
      <div class="mt-5">
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="diariaData" class="form-label">Data do Agendamento</label>
                <input type="date" class="form-control" id="siNumero"  disabled>
            

                <label for="diariaText" class="form-label"></label>
                <input type="text" class="form-control" id="siData" placeholder="Terça-Feira" disabled>
              
            </div>
        </div>
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
      <!-- Github buttons -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>
