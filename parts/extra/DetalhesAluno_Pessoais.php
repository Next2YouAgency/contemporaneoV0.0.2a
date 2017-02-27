<h4>Dados Pessoais</h4>
<div class="form-group col-md-4">
    <label for="nome_aluno">Nome do Aluno:</label>
    <input type="text" name="nome_aluno" id="nome_professor" class="form-control" value="<?php echo $resBuscarAluno['nome_aluno'] ?>">
</div>
<div class="form-group col-md-4">
    <label for="escolaridade_aluno">Escolaridade</label>
    <select name="materia_principal" id="materia_principal" class="form-control" required>
        <option value="<?php echo $resBuscarAluno['escolaridade_aluno'] ?>" selected>
            <?php echo $resBuscarAluno['escolaridade_aluno'] ?>
        </option>
        <?php
        $ExeQrBuscarEscolaridadeDisp = mysql_query("SELECT * FROM escolaridade_aluno");
        while ($ResBuscarEscolaridadeDisp = mysql_fetch_assoc($ExeQrBuscarEscolaridadeDisp)) {
            ?>
            <option value="<?php echo $ResBuscarEscolaridadeDisp['nivel'] ?>">
                <?php echo $ResBuscarEscolaridadeDisp['nivel'] ?>
            </option>
            <?php
        }
        ?>
    </select>
</div>
<div class="form-group col-md-4">
    <label for="telefone_aluno">Telefone do aluno:</label>
    <input type="tel" name="telefone_aluno" id="telefone_aluno" class="form-control" required value="<?php echo $resBuscarAluno['telefone_aluno'] ?>">
</div>
<div class="col-md-3"style="margin-bottom: -50px;float: left;">
    <img src="<?php echo $resBuscarAluno['foto_aluno'] ?>" class="img-responsive img-circle">
</div>
<div class="col-md-7" style="margin-top: 50px">
    <label>Alterar a foto: </label>
    <input type="file" name="alterar_foto" class="form-control">
</div>