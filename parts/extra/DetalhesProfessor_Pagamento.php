<div id="dados-pagamento">
    <h4>Dados para Pagamento</h4>
    <div class="form-group col-md-2">
        <label for="banco_professor">Banco:</label>
        <select name="banco_professor" id="banco_professor" class="form-control">
            <option  value="<?php echo $resBuscarProfessor['banco_professor'] ?>">
                <?php echo $resBuscarProfessor['banco_professor'] ?>
            </option>
            <option value="Itaú">Itaú</option>
        </select>
    </div>
    <div class="form-group col-md-3">
        <label for="agencia_banco_professor">Agência:</label>
        <input type="number" name="agencia_banco_professor" id="agencia_banco_professor" class="form-control" value="<?php echo $resBuscarProfessor['agencia_banco_professor'] ?>">
    </div>
    <div class="form-group col-md-2">
        <label for="dig_agencia_banco_professor"><abbr title="Deixe vazio caso não tenha">Digito:</abbr></label>
        <input type="number" name="dig_agencia_banco_professor" id="dig_agencia_banco_professor" class="form-control" value="<?php echo $resBuscarProfessor['dig_agencia_banco_professor'] ?>">
    </div>
    <div class="form-group col-md-5">
        <label for="conta_banco_professor"><abbr title="Inclua o dígito após hífen">Conta:</abbr></label>
        <input type="text" name="conta_banco_professor" id="conta_banco_professor" class="form-control" value="<?php echo $resBuscarProfessor['conta_banco_professor'] ?>">
    </div>
    <div class="form-group col-md-3">
        <label for="valor_hora">Valor Combinado:</label>
        <input type="text" name="valor_hora" id="valor_hora" class="form-control" value="<?php echo $resBuscarProfessor['valor_hora'] ?>">
    </div>
    <div class="form-group col-md-3">
        <label for="valor_hora_res">Valor Residencial:</label>
        <input type="text" name="valor_hora_res" id="valor_hora_res" class="form-control" value="<?php echo $resBuscarProfessor['valor_hora_res'] ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="dia_pagamento">Data para Pagamento:</label>
        <select name="dia_pagamento" class="form-control">
            <option value="<?php echo $resBuscarProfessor['dia_pagamento'] ?>"><?php echo $resBuscarProfessor['dia_pagamento'] ?></option>
            <?php
            $final = 30;
            while ($i < $final) {
                $i = $i + 5;
                ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>