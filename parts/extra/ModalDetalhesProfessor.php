<div class="modal fade" id="ModalDetalhesProfessor<?php echo $resBuscarProfessor['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalDetalhesAluno">
    <div class="modal-dialog modal-lg" role="document">
        <form action="?acesso=Consultar_Professores" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Professor: <?php echo $resBuscarProfessor['nome'] ?> - ID: <?php echo $resBuscarProfessor['id'] ?></h4>
                </div>
                <div class="modal-body">
                    <script src="js/buscarCEP.js"></script>
                    <section class="col-md-12" style="padding-top: 0; padding-bottom: 15px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#dados_pessoais<?php echo $resBuscarProfessor['id'] ?>" aria-controls="dados_pessoais" role="tab" data-toggle="tab">Dados Pessoais</a></li>
                            <li role="presentation"><a href="#dados_correspondencia<?php echo $resBuscarProfessor['id'] ?>" aria-controls="dados_correspondencia" role="tab" data-toggle="tab">Dados de Correspondência</a></li>
                            <li role="presentation"><a href="#dados_pagamento<?php echo $resBuscarProfessor['id'] ?>" aria-controls="dados_pagamento" role="tab" data-toggle="tab">Dados de Pagamento</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="dados_pessoais<?php echo $resBuscarProfessor['id'] ?>">
                                <?php include 'parts/extra/DetalhesProfessor_Pessoais.php';?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="dados_correspondencia<?php echo $resBuscarProfessor['id'] ?>">
                                <?php include 'parts/extra/DetalhesProfessor_Corresp.php';?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="dados_pagamento<?php echo $resBuscarProfessor['id'] ?>">
                                <?php include 'parts/extra/DetalhesProfessor_Pagamento.php';?>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    <input type="hidden" name="IdProfessor" value="<?php echo $resBuscarProfessor['id'] ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" name="AtualizarProfessor" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>