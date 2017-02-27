<div id="retorno-cep">
    <h4>Dados de Correspondência</h4>
    <div class="form-group col-md-2">
        <label for="cep_endereco">CEP</label>
        <input type="text" name="cep_endereco" onblur="" id="cep_endereco" class="form-control" value="<?php echo $resBuscarAluno['cep_endereco'] ?>">
    </div>
    <div class="form-group col-md-5">
        <label for="endereco_completo">Endereço</label>
        <input type="text" name="endereco_completo" id="endereco_completo" class="form-control" value="<?php echo $resBuscarAluno['endereco_completo'] ?>">
    </div>
    <div class="form-group col-md-2">
        <label for="numero_endereco">Nº</label>
        <input type="number" name="numero_endereco" id="numero_endereco" class="form-control" value="<?php echo $resBuscarAluno['numero_endereco'] ?>">
    </div>
    <div class="form-group col-md-3">
        <label for="bairro_endereco">Bairro</label>
        <input type="text" name="bairro_endereco" id="bairro_endereco" class="form-control" value="<?php echo $resBuscarAluno['bairro_endereco'] ?>">
    </div>
    <div class="form-group col-md-3">
        <label for="cidade_endereco">Cidade</label>
        <input type="text" name="cidade_endereco" id="cidade_endereco" class="form-control" value="<?php echo $resBuscarAluno['cidade_endereco'] ?>">
    </div>
    <div class="form-group col-md-3">
        <label for="estado">Estado</label>
        <input type="text" name="estado_endereco" id="estado_endereco" class="form-control" value="<?php echo $resBuscarAluno['estado_endereco'] ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="complemento_endereco">Complemento</label>
        <input type="text" name="complemento_endereco" id="complemento_endereco" class="form-control" value="<?php echo $resBuscarAluno['complemento_endereco'] ?>">
    </div>
</div>