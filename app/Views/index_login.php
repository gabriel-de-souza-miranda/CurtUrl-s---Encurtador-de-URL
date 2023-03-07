<?php
//header
echo $this->include('includes/header', array('titulo' => $titulo));

//css da pagina
echo $this->include('includes/style');

//footer padrão
echo $this->include('includes/footer');

?>

<?php $session = session(); ?>
<br>

<!-- Modal -->

<<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Seus Dados</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>

                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Nome</th>
                            <td><?php echo $session->get('nome') ?></td>
                            <!-- <td><i class="fas fa-edit"></td> -->
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><?php echo $session->get('email') ?></td>
                             <!--<td><i class="fas fa-edit"></td> -->
                        </tr>
                        <tr>
                            <th scope="row">Senha</th>
                            <td>************</td>
                            <td><i class="fas fa-edit" href="#" style="cursor:pointer" onClick="abreModal2()"></i></td>
                        </tr>
                    </tbody>
                </table>


                <br>
            </form>
        </div>

    </div>

</div>
</div>
</div>
</div>




<div class="card-group container-md card border border-dark" style="height: 28rem; padding-left:0px; padding-right:0px">
    <div class="card">
        <div class="card-body">

            <h5 class="text-center" style="font-weight:bold">Cole a URL a ser encurtada</h5>
            <br>

            <?php if (isset($erro_url)) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $erro_url; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>


            <div class="d-flex justify-content-center">

                <form class="form-inline" method="post" action="<?php echo base_url("encurtador/shortUrl") ?>">
                    <br>
                    <div class="form-group mx-sm- mb- col-lg">
                        <input id="encurtar" name="encurtar" class="form-control border border-dark" id="url" placeholder="Encurte o seu link" size="60">

                        <button type="submit" class="btn btn-danger border border-dark col-sm-">Encurtar</button>
                    </div>




                </form>
            </div>
            <div class="t">

                <br>

                
                <?php if (isset($urlShort)) : ?>
                    <div class="alert alert-info" role="alert">
                    <div class="d-flex content-center">

                        <p class="text-succes font-weight-bold" name="url" id="url">
                            URL encurtada:
                            <div class="form-group mx-sm- mb- col-lg">
                                <input id="inputTest" value="<?php echo $urlShort; ?>" class="form-control border border-dark font-weight-bold" readonly>
                            </div>

                            <div class="">
                                <button class="btn btn-success border border-dark center" onclick="copiarTexto()">Copiar</button>
                            </div>

                            
                        </p>
                    </div>



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
               

                <div class="alert alert-danger" role="alert">
                    <h5 class="text-center">Lembrete: Veja e gerencie seu Histórico de Url's <a href="<?php echo base_url('historicourls/hist') ?>"><button class="btn btn-outline-danger">AQUI</button></a> e tenha acesso a pagina para visualização</h5>
                </div>

                <br>
                <br>
                <br>
                <br>




            </div>
        </div>
    </div>

    <script>
        $(function() {
            $(".btn").on("click", function() {
                $.ajax({
                    url: <?php base_url('user/historico') ?>,
                    success: function(result) {
                        $(table).html(result);
                    }
                });
            });
        });
    </script>

    <!-- Grid row -->