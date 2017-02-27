<div class="modal fade in text-muted" id="modalPagamentoOK" tabindex="1" role="dialog" aria-labelledby="myModalLabel" style="display: block;overflow-y: auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dados do professor <?php echo $nome_professor ?> atualizados</h4>
            </div>
            <div class="modal-body">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#dados_pessoais" aria-controls="home" role="tab" data-toggle="tab">Dados Pessoais</a></li>
                        <li role="presentation"><a href="#dados_correspondencia" aria-controls="profile" role="tab" data-toggle="tab">Dados de Coorespondência</a></li>
                        <li role="presentation"><a href="#dados_pagamento" aria-controls="messages" role="tab" data-toggle="tab">Dados de Pagamento</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="dados_pessoais">
                            <h3>Dados pessoais:</h3>
                            <div class="form-group col-md-3">
                                <label>Nome: </label>
                                <span class="form-control"><?php echo $nome_professor; ?></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Disciplina: </label>
                                <span class="form-control"><?php echo $materia; ?></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Telefone Principal: </label>
                                <span class="form-control"><?php echo $telefone_principal; ?></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Telefone Contato: </label>
                                <span class="form-control"><?php echo $telefone_contato; ?></span>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="dados_correspondencia">
                            <h3>Dados de Correspondência: </h3>
                            <div class="form-group col-md-2">
                                <label>CEP: </label>
                                <span class="form-control"><?php echo $cep_endereco; ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Endereço: </label>
                                <span class="form-control"><?php echo $endereco_completo; ?></span>
                            </div>
                            <div class="form-group col-md-1">
                                <label>nº: </label>
                                <span class="form-control"><?php echo $numero_endereco; ?></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Bairro: </label>
                                <span class="form-control" >
                                    <abbr title="<?php echo $bairro_endereco ?>">
                                        <?php echo lmWord($bairro_endereco, 25); ?>
                                    </abbr>
                                </span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Cidade: </label>
                                <span class="form-control"><?php echo $cidade_endereco; ?></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Estado: </label>
                                <span class="form-control"><?php echo $estado_endereco; ?></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Complemento: </label>
                                <span class="form-control"><?php echo $complemento_endereco; ?></span>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="dados_pagamento">
                            <div class="form-group col-md-3">
                                <label>Banco: </label>
                                <span class="form-control"><?php echo $banco_professor; ?></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Agência: </label>
                                <span class="form-control"><?php echo $agencia_banco_professor; ?></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Digito: </label>
                                <span class="form-control"><?php echo $dig_agencia_banco_professor; ?></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Conta: </label>
                                <span class="form-control"><?php echo $conta_banco_professor; ?></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Valor Normal: </label>
                                <span class="form-control"><?php echo $valor_hora; ?></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Valor Residencial: </label>
                                <span class="form-control"><?php echo $valor_hora_res; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <a href="?acesso=Consultar_Professores" class="btn btn-success" data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>