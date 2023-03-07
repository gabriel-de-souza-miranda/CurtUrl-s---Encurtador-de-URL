<?php
//header
echo $this->include('includes/header', array('titulo' => $titulo));

//css da pagina
echo $this->include('includes/style');

//footer padrão
echo $this->include('includes/footer');
?>

<!--gambiarra-->
<br><br>

<div class="container-sm card border border-dark" style="width: 28rem;">

    <br>
    <h3 class="text-center">Recuperação de Senha</h3>
    <br>
    <p class="font-weight-bold">Digite seu email cadastrado no sistema, e uma mensagem será enviada para você com o passo a passo para realizar a recuperação</p>

    

    <?php if (isset($msgErro)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $msgErro; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>


    <form id="inline" method="post" action="<?php echo base_url("sendemail/email") ?>">
        <div class="form-label-group">
            <input type="text" class="form-control border border-primary" placeholder="Email" id="email" name="email">
            <label for="email"></label>
        </div>

      

        <button type="submit" class="btn btn-dark col border border-dark font-weight-bold">Recuperar Senha</button>

        <br>
        <br>

       

    </form>
</div>