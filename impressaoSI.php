
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
        //require "menu.php"
      ?>
      <style>
        @page {
          size: A3;
          margin: 0;
        }
        @media print {
          body {-webkit-print-color-adjust: exact;}
          #menu-lateral{display: none !important;}
        }
      </style>
      <div class="row">
        <img src="assets/brasao.png" style="width:8%;height:8%" class="rounded mx-auto d-block mt-3" alt="Brasão do Município de São Bernardo do Campo">
      </div>
      <div class="row">
          <p class="text-center mb-4">Município de São Bernardo do Campo<br>Secretaria de Transportes e vias públicas<br>Departamento de engenharia de trafego - ST-1
      </div>
      <div class="row mt-4 mb-4">
        <div class="col-md-2">
        </div>
        <div class="col-md-3">
          <span><strong>S.I. Nº: </strong>999/2023</span>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-2">
          <span><strong>Interessado: </strong>ST-1</span>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-2">
        </div>
        <div class="col-md-3">
          <span><strong>Projeto Nº: </strong>888/2023</span>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-2">
          <span><strong>Destino: </strong>ST-111.2</span>
        </div>
      </div>
      <div class="row d-flex justify-content-center mt-4 mb-5">
        <div class="col-md-10">
            <div class="border border-secondary border-2 px-4 py-2 text-center" style="width:100%">Mussum Ipsum, cacilds vidis litro abertis. Praesent vel viverra nisi. Mauris aliquet nunc non turpis scelerisque, eget.Cevadis im ampola pa arma uma pindureta.Mais vale um bebadis conhecidiss, que um alcoolatra anonimis.Delegadis gente finis, bibendum egestas augue arcu ut est.</div>
        </div>
      </div>
      <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-10">
            Observações:
        </div>
      </div>
      <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-10">
            <div class="border border-secondary border-2 px-4 py-2 text-center" style="width:100%; background-color:rgb(247, 217, 126)">Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis.Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.Não sou faixa preta cumpadi, sou preto inteiris, inteiris.Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis.</div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <span><strong>Local: </strong>ENDEREÇO DO ATENDIMENTO</span>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <span><strong>Bairro: </strong>BAIRRO DO ATENDIMENTO</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class="text-center mt-5">São Bernardo do Campo, 04/05/2023
        </div>
      </div><br><br><br>
      <div class="row">
        <div class="col-md-12">
          <div class="text-center mt-5"><strong>Ilma Y. H. Enjiu</strong></div>
        </div>
        <div class="col-md-12">
          <div class="text-center">Diretora de Divisão</div>
        </div>
      </div><br><br><br><br><br>
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-9">
          <span>rba</span>
        </div>
      </div>


      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
      <!-- Github buttons -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>
