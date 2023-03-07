<?php
//header
echo $this->include('includes/header', array('titulo' => $titulo));

//css da pagina
echo $this->include('includes/style');

//footer padrão
echo $this->include('includes/footer');
?>

<!--gambiarra-->
<br>
<br>
<br>

<div class="container-sm card border border-dark" style="width: 28rem;">

    <br>
    <h3 class="text-center">Nova Senha</h3>
    <br>
    <p class="font-weight-bold">Prencha os campos corretamente</p>


    <?php if (isset($msgErro)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $msgErro; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>


    <form id="inline" method="post" action="<?php echo base_url("auth/defsenha") ?>">
        <div class="form-label-group">
            <input type="text" class="form-control border border-primary" placeholder="Código enviado em seu email" id="cod" name="cod">
            <label for="cod"></label>
        </div>

        <div class="form-label-group">
            <input type="password" class="form-control border border-primary" placeholder="Nova senha" id="senha" name="senha">
            <label for="senha"></label>
        </div>

      

        <button type="submit" class="btn btn-dark col border border-dark font-weight-bold">Definir nova Senha</button>

        <br>
        <br>       

    </form>
</div>