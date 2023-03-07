<?php
//header
echo $this->include('includes/header', array('titulo' => $titulo));

//rodapé
echo $this->include('includes/footer', array('titulo' => $titulo));

//css da pagina
echo $this->include('includes/style');

?>

<br>

<!--
<p class="h5 font-weight-bold text-white text-white bg-dark" style="padding:20px; font-size:22px; text-align:center">
  Um encurtador de URL desenvolvido para compactar o tamanhos de seus links
</p>-->




<div class="card-group container-md card border border-dark" style="height: 28rem; padding-left:0px; padding-right:0px">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title text-center font-weight-bold">Encurte sua URL sem login AQUI:</h5>

      <br>


      <h5 class="text-center" style="font-weight:bold">Cole a URL a ser encurtada</h5>

      <br>

      <?php if (isset($erro)) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?php echo $erro; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <div class="d-flex justify-content-center">

        <form class="form-inline" method="post" action=">
          <br>
          <div class="form-group mx-sm-2 mb-2 col-lg">
            <input id="encurtar" name="encurtar" class="form-control border border-dark" id="url" placeholder="Encurte o seu link" size="60">
          </div>

          <div class="container col-xl-3">
            <button type="submit" class="btn btn-danger border border-dark" id="url">Encurtar</button>
          </div>


        </form>
      </div>
      <br>

      <?php if (isset($urlShort)) : ?>
        <div class="alert alert-info" role="alert">
          <p class="text-center text-succes font-weight-bold" name="url" id="url">
            URL encurtada:
            <div class="col-md-10 mb-3 mx-sm-4">
              <input id="inputTest" value="<?php echo $urlShort; ?>" class="form-control border border-dark font-weight-bold" readonly>
            </div>

            <div class="container col-xl-3">
              <button class="btn btn-success border border-dark center" onclick="copiarTexto()">Copiar</button>
            </div>

            <a id="url" href="<?php echo $urlShort; ?>" target="_blank"> </a>

          </p>



          <script>
            let copiarTexto = () => {
              //captura o elemento input
              const inputTest = document.querySelector("#inputTest");

              //seleciona todo o texto do elemento
              inputTest.select();
              //executa o comando copy
              //aqui é feito o ato de copiar para a area de trabalho com base na seleção
              document.execCommand('copy');
            };
          </script>
        </div>
      <?php endif; ?>

    </div>
  </div>

  <!--Segunda coluna do card -->

  <div class="card">
    <div class="card-body">
      <h5 class="card-title text-center font-weight-bold">Cadastre-se no CurtUrl's, Benefícios:</h5>
      <br>
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-11 mt-md-0 mt-3">

          <!-- Content -->
          <br>
          <h6 class="text-uppercase font-weight-bold">Gestão de url's</h6>
          <p> Permite visualizar a quantidade de acesso aos links encurtadados por você </p>

          <h6 class="text-uppercase font-weight-bold">Histórico</h6>
          <p> Permite visualizar um histórico completo com todos as url's encurtadas </p>

          <h6 class="text-uppercase font-weight-bold">Compartilhamento</h6>
          <p> Permite compartilhar todas as url's encurtadas pelo o usuário enquanto logado </p>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->
    </div>
  </div>


</div>