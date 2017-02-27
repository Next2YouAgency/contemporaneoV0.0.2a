<div class="modal fade" id="ModalDetalhesAluno<?php echo $resBuscarAluno['matricula_aluno'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalDetalhesAluno">
    <div class="modal-dialog modal-lg" style="width:80%" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $resBuscarAluno['nome_aluno'] ?></h4>
                </div>
                <div class="modal-body">
                    <section class="col-md-12" style="padding-top: 0; padding-bottom: 15px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#dados_responsaveis<?php echo $resBuscarAluno[matricula_aluno] ?>" aria-controls="dados_pagamento<?php echo $resBuscarAluno[matricula_aluno] ?>" role="tab" data-toggle="tab">Dados Responsáveis</a></li>
                            <li role="presentation"><a href="#dados_pessoais<?php echo $resBuscarAluno[matricula_aluno] ?>" aria-controls="dados_pessoais<?php echo $resBuscarAluno[matricula_aluno] ?>" role="tab" data-toggle="tab">Dados Aluno</a></li>
                            <li role="presentation"><a href="#dados_correspondencia<?php echo $resBuscarAluno[matricula_aluno] ?>" aria-controls="dados_correspondencia<?php echo $resBuscarAluno[matricula_aluno] ?>" role="tab" data-toggle="tab">Dados de Correspondência</a></li>
                            <li role="presentation"><a href="#dados_aulas<?php echo $resBuscarAluno[matricula_aluno] ?>" aria-controls="dados_aulas<?php echo $resBuscarAluno[matricula_aluno] ?>" role="tab" data-toggle="tab">Aulas assistidas</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="dados_responsaveis<?php echo $resBuscarAluno[matricula_aluno] ?>">
                                <?php include 'parts/extra/DetalhesAluno_Responsaveis.php'; ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="dados_pessoais<?php echo $resBuscarAluno[matricula_aluno] ?>">
                                <?php include 'parts/extra/DetalhesAluno_Pessoais.php'; ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="dados_correspondencia<?php echo $resBuscarAluno[matricula_aluno] ?>">
                                <?php include 'parts/extra/DetalhesAluno_Corresp.php'; ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="dados_aulas<?php echo $resBuscarAluno[matricula_aluno] ?>" style="overflow-y: scroll;max-height: 180px">
                                <?php include 'parts/extra/DetalhesAluno_Aulas.php'; ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group" style="margin-top:100px">
                            <div class="col-md-3">
                                <label>Matrícula:</label>
                                <span class="form-control">
                                    <?php echo $resBuscarAluno[matricula_aluno] ?>
                                </span>
                            </div>
                            <div class="col-md-3">
                                <label for="desconto">Desconto: </label>
                                <span name="desconto" id="desconto" class="form-control">
                                    <?php echo $resBuscarAluno['desconto'] ?>
                                </span>
                            </div>
                            <div class="col-md-3">
                                <label for="desconto">Total de pagamento: </label>
                                <span name="desconto" id="desconto" class="form-control">
                                    <?php
                                    $matriculaTotal = $resBuscarAluno[matricula_aluno];
                                    $QueryTotalPagamento = "SELECT valor FROM agenda_aulas WHERE matricula_aluno = '$matriculaTotal'";
                                    $ExeQrTotalPagamento = mysql_query($QueryTotalPagamento);
                                    if (mysql_num_rows($ExeQrTotalPagamento) <= 0) {
                                        echo "0";
                                    } else if (mysql_num_rows($ExeQrTotalPagamento) > 1) {
                                        while ($ResBuscarTotalPagamento = mysql_fetch_assoc($ExeQrTotalPagamento)) {
                                            $QueryTotalPorAluno = "SELECT SUM(valor) FROM agenda_aulas WHERE matricula_aluno = '$matriculaTotal' AND pagamento = 'nao'";
                                            $ExeQrTotalPorAluno = mysql_query($QueryTotalPorAluno);
                                            $TotalPgto += $ResBuscarTotalPagamento['valor'];
                                        }
                                        echo $TotalPgto;
                                    } else {
                                        while ($ResBuscarTotalPagamento = mysql_fetch_assoc($ExeQrTotalPagamento)) {
                                            echo $ResBuscarTotalPagamento['valor'];
                                        }
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>