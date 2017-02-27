<h4>Dados dos Responsáveis:</h4>
<div class="form-group col-md-5">
    <label for="nome_mae">Nome da Mãe:</label>
    <input type="tel" name="nome_mae" id="nome_mae" class="form-control" value="<?php echo $resBuscarAluno['nome_mae'] ?>">
</div>
<div class="form-group col-md-4">
    <label for="telefone_mae">Telefone da Mãe:</label>
    <input type="tel" name="telfone_mae" id="telefone_mae" class="form-control" value="<?php echo $resBuscarAluno['telefone_mae'] ?>">
</div>
<div class="form-group col-md-3" style="margin-top:30px">
    <input type="radio" name="responsavel_pagamento" id="responsavel_pagamento_mae" <?php if ($resBuscarAluno['responsavel_pagamento'] == $resBuscarAluno['nome_mae']) {
    echo "checked";
} ?>>
    <label for="responsavel_pagamento_mae">Responsável pagamento: </label>
</div>
<div class="form-group col-md-5">
    <label for="nome_pai">Nome do Pai:</label>
    <input type="tel" name="nome_pai" id="nome_pai" class="form-control" value="<?php echo $resBuscarAluno['nome_pai'] ?>">
</div>
<div class="form-group col-md-4">
    <label for="telefone_pai">Telefone do Pai:</label>
    <input type="tel" name="telfone_pai" id="telefone_pai" class="form-control" value="<?php echo $resBuscarAluno['telefone_pai'] ?>">
</div>
<div class="form-group col-md-3" style="margin-top:30px">
    <input type="radio" name="responsavel_pagamento" id="responsavel_pagamento_pai" <?php if ($resBuscarAluno['responsavel_pagamento'] == $resBuscarAluno['nome_pai']) {
    echo "checked";
} ?>>
    <label for="responsavel_pagamento_pai">Responsável pagamento: </label>
</div>