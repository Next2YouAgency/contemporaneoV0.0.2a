<h4>Aulas assistidas: </h4>
<?php
$ExeQrAulasDoAluno = mysql_query("SELECT * FROM agenda_aulas WHERE matricula_aluno = '$resBuscarAluno[matricula_aluno]'");
if (mysql_num_rows($ExeQrAulasDoAluno) == 0) {
    ?>
    <div class="col-md-12">
        <p class="lead">Nenhuma aula agendada</p>
    </div>
    <?php
} else {
    ?>
    <div class="col-md-1"><label>Data: </label></div>
    <div class="col-md-3"><label>Descrição da aula:</label></div>
    <div class="col-md-2"><label>Sala Usada: </label></div>
    <div class="col-md-2"><label>Professor: </label></div>
    <div class="col-md-2"><label>Disciplina: </label></div>
    <div class="col-md-1"><label>Entrada: </label></div>
    <div class="col-md-1"><label>Tempo: </label></div>
    <?php
    while ($ReturnAulasDoAluno = mysql_fetch_assoc($ExeQrAulasDoAluno)) {
        ?>
        <div class="col-md-1">
            <span class="form-control">
                <?php echo date('d/m', strtotime($ReturnAulasDoAluno['data'])); ?>
            </span>
        </div>
        <div class="col-md-3">
            <span class="form-control">
                <?php echo lmWord($ReturnAulasDoAluno['descricao_aula'],25)." ..."; ?>
            </span>
        </div>
        <div class="col-md-2">
            <span class="form-control">
                <?php echo substr($ReturnAulasDoAluno['sala'], 11, 4) . ' ' . substr($ReturnAulasDoAluno['sala'], 15, 1); ?>
            </span>
        </div>
        <div class="col-md-2">
            <span class="form-control">
                <?php echo lmWord($ReturnAulasDoAluno['prof'], 14); ?>
            </span>
        </div>
        <div class="col-md-2">
            <span class="form-control">
                <?php echo lmWord($ReturnAulasDoAluno['materia'], 14); ?>
            </span>
        </div>
        <div class="col-md-1">
            <span class="form-control">
                <?php echo $ReturnAulasDoAluno['entrada']; ?>
            </span>
        </div>
        <div class="col-md-1">
            <span class="form-control">
                <?php echo $ReturnAulasDoAluno['qtd_hora']; ?>
            </span>
        </div>
        <div class="clearfix"></div>
        <hr>
        <?php
    }
}