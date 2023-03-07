<?php
//header
echo $this->include('includes/header', array('titulo' => $titulo));

//css da pagina
echo $this->include('includes/style');

//footer padrão
echo $this->include('includes/footer');

?>

<br>

<div class="container-sm card border border-dark" style="width: 28rem;">

   
    <h3 class="text-center">Cadastro de Usuário</h3>
    <br>

    <?php if (isset($msgErro)): ?>
    
        <div class="alert alert-warning alert-dismissible fade show" role="alert">        
        <?php echo $msgErro; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <form id="inline" method="post" action="<?php echo base_url("user/inseriruser") ?>">
        <div class="form-label-group">
            <input type="text" class="form-control border border-dark mr-sm-2" placeholder="Nome completo" id="nome" name="nome">
            <!-- <i class="fas fa-user"></i> -->

            <label for="nome"></label>
        </div>

        <div class="form-label-group">
            <input type="text" class="form-control border border-dark" placeholder="Email" id="email" name="email">
            <small id="nameHelp" class="form-text text-muted">ex: nome@email.com</small>
            <label for="email"></label>
        </div>

        <div class="form-label-group">
            <input type="password" class="form-control border border-dark" placeholder="Senha" id="senha" name="senha">
            <label for="senha"></label>
        </div>

        <div class="form-label-group">
            <input type="password" class="form-control border border-dark" placeholder="Confirmar senha" id="senhacon" name="senhacon">
            <label for="senhacon"></label>
        </div>

        <button type="submit" class="btn btn-dark col border border-dark font-weight-bold">Cadastrar</button>
        <br>
        <br>
    </form>
</div>


