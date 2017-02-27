<!-- Modal Alterar Pagamento-->
<div class="modal fade" id="EnviarComprovante<?php echo $ReturnPagamentos[id] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enviar Comprovantes</h4>
            </div>
            <form class="form-horizontal" method="post" action="?acesso=Exibir_Pagamentos_Alunos">
                <div class="modal-body">
                    <div class="col-md-12" style="margin-bottom:15px;width:100%">
                        <span class="col-md-6">
                            Aluno: <?php echo $ReturnPagamentos[nome_aluno]; ?>
                        </span>
                        <span class="col-md-3">
                            Dia: <?php echo $ReturnPagamentos[data]; ?>
                        </span>
                        <span class="col-md-3">
                            Disciplina: <?php echo $ResBuscarPagamentos[materia]; ?>
                        </span>
                    </div>
                    <div class="col-md-12">

                        <div class="form-group has-success has-feedback">
                            <label class="control-label col-sm-3 text-right" for="EmailComprovante">Informe o e-mail: </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" id="EmailComprovante" name="EmailComprovante" aria-describedby="<?php echo $ReturnPagamentos[id]; ?>" placeholder="Comprovante da Aula <?php echo $ReturnPagamentos[id]; ?>">
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="EnviarComprovante" class="btn btn-success">Enviar Comprovante</button>
                </div>
                <input type="hidden" name="NomeResponsavel" value="<?php echo $ResBuscarPagamentos[responsavel_pagamento]?>">
                <input type="hidden" name="NomeAluno" value="<?php echo $ResBuscarPagamentos[nome_aluno]?>">
                <input type="hidden" name="DescricaoAula" value="<?php echo $ResBuscarPagamentos[descricao_aula]?>">
                <input type="hidden" name="DataAula" value="<?php echo $ResBuscarPagamentos[data]?>">
                <input type="hidden" name="ProfessorAula" value="<?php echo $ResBuscarPagamentos[prof]?>">
                <input type="hidden" name="DisciplinaAula" value="<?php echo $ResBuscarPagamentos[materia]?>">
                <input type="hidden" name="QtdHoraAula" value="<?php echo $ResBuscarPagamentos[qtd_hora]?>">
                <input type="hidden" name="ValorAula" value="<?php echo $ResBuscarPagamentos[valor]?>">
            </form>
        </div>
    </div>
</div>
</div>