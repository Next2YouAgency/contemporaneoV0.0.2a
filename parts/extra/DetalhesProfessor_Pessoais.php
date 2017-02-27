<h4>Dados Pessoais</h4>
<div class="form-group col-md-6">
    <label for="nome_professor">Nome do Professor:</label>
    <input type="text" name="nome_professor" id="nome_professor" class="form-control" value="<?php echo $resBuscarProfessor['nome'] ?>">
</div>
<div class="form-group col-md-6">
    <label for="materia_principal">Matéria Principal</label>
    <select name="materia_principal" id="materia_principal" class="form-control" required>
        <option value="<?php echo $resBuscarProfessor['materia'] ?>" selected>
            <?php echo $resBuscarProfessor['materia'] ?>
        </option>
        <?php
        $ExeQrBuscarMateriasDisp = mysql_query("SELECT * FROM materias_disponiveis");
        while ($ResBuscarMateriasDisp = mysql_fetch_assoc($ExeQrBuscarMateriasDisp)) {
            ?>
            <option value="<?php echo $ResBuscarMateriasDisp['materia'] ?>"><?php echo $ResBuscarMateriasDisp['materia'] ?></option>
            <?php
        }
        ?>
    </select>
</div>
<div class="form-group col-md-6">
    <label for="telefone_principal">Telefone Principal:</label>
    <input type="tel" name="telefone_principal" id="telefone_principal" class="form-control" required value="<?php echo $resBuscarProfessor['telefone_principal'] ?>">
</div>
<div class="form-group col-md-6">
    <label for="telefone_contato">Telefone para contato:</label>
    <input type="tel" name="telefone_contato" id="telefone_contato" class="form-control" value="<?php echo $resBuscarProfessor['telefone_contato'] ?>">
</div>