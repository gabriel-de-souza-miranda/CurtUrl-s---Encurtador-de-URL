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
    <h3 class="text-center">Login de Usuário</h3>
    <br>

    <?php if (isset($msgErro)): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $msgErro; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>


    <form id="inline" method="post" action="<?php echo base_url("auth/login") ?>">
        <div class="form-label-group">
            <input type="text" class="form-control border border-primary" placeholder="Email" id="email" name="email">
            <label for="email"></label>
        </div>

        <div class="form-label-group">
            <input type="password" class="form-control border border-primary" placeholder="Senha" id="senha" name="senha">
            <label for="senha"></label>
        </div>

        <button type="submit" class="btn btn-dark col border border-dark font-weight-bold">Entrar</button>

        <br>
        <br>

        <p class="text-right font-weight-bold">
            <a href="<?php echo base_url("site/senha") ?>">Esqueci a senha</a>
            <br>
            <a href="<?php echo base_url("site/cadastro") ?>">Realizar cadastro</a>
        </p>

    </form>
</div>