<!DOCTYPE html>
<?php
//header
echo $this->include('includes/header', array('titulo' => $titulo));

//css da pagina
echo $this->include('includes/style');

//footer padrão
echo $this->include('includes/footer');

?>

<br>
<?php $session = session(); ?>
<div class="container-sm card border border-dark" style="width: 28rem;">

   
    <h3 class="text-center">Alterar Senha</h3>
    <br>
    <?php if (isset($msgErro)): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $msgErro; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <form id="inline" method="post" action="<?php echo base_url("user/alteraSenha") ?>">
         <div class="form-group">
                    <label for="inputPassword6" style="padding: 5px"><b>Senha Atual</b></label>
                    <input type="password" id="senhaAtual" name="senhaAtual" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" style="width:90%">
    
                </div>

                <div class="form-group">
                    <label for="inputPassword6" style="padding: 5px"><b>Nova Senha</b></label>
                    <input type="password" id="novaSenha" name="novaSenha" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" style="width:90%">
    
                </div>

                <div class="form-group">
                    <label for="inputPassword6" style="padding: 5px"><b>Confirmar Senha</b></label>
                    <input type="password" id="senhaConf" name="senhaConf" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" style="width:90%">
    
                </div>
                <button type="submit" class="btn btn-dark col border border-dark font-weight-bold">Salvar</button>
        
    </form>
</div>


