<div class="modal fade" id="AlterarPagamento<?php echo $ReturnPagamentos[id] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <form action="?acesso=Exibir_Pagamentos_Alunos" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Alterar o pagamento da aula <?php echo $ReturnPagamentos[id]?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-2">
                        <label for="Matricula">Matrícula: </label>
                        <input type="text" name="Matricula" id="Matricula" value="<?php echo $ReturnPagamentos[matricula] ?>" disabled class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="NomeAluno">Nome: </label>
                        <input type="text" name="NomeAluno" id="NomeAluno" value="<?php echo $ReturnPagamentos[nome_aluno] ?>" disabled class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="ValorPagamento">Valor: </label>
                        <input type="text" id="ValorPagamento" value="<?php echo "R$ " . str_replace('.', ',', $ReturnPagamentos[valor]) ?>" disabled class="form-control">
                        <input type="hidden" name="ValorPagamento" value="<?php echo $ReturnPagamentos[valor] ?>">
                        <input type="hidden" name="NumeroMatricula" value="<?php echo $ReturnPagamentos[matricula] ?>">
                        <input type="hidden" name="NomeAluno" value="<?php echo $ReturnPagamentos[nome_aluno] ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="FormaPagamento">Forma Pagamento:</label>
                        <select name="FormaPagamento" id="FormaPagamento" class="form-control" onchange="ChequeSelecionado()">
                            <option value="deposito">Depósito</option>
                            <option value="dinheiro">Dinheiro</option>
                            <option value="cheque">Cheque</option>
                            <option value="abono">Abono</option>
                        </select>
                    </div>
                    <div id="returmMetodoPagamento">
                        <div class="form-group col-md-2">
                            <label for="ComprovantePagamento"><abbr title="Ou Número do Recibo">Comprovante:</abbr></label>
                            <input type="text" name="ComprovantePagamento" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    <input type="hidden" name="id_aula" value="<?php echo $ReturnPagamentos[id] ?>">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="SalvarPagamentos">Salvar Alterações</button>
                </div>
            </div>
        </form>
    </div>
</div>