<section class="col-md-12" style="padding:10px 0;">
    <h3>Compartilhar sala de aula:</h3>
    <form action="?acesso=Agendar_Compartilhado" method="post">
        <div class="form-group col-md-2">
            <label for="DisciplinaCompartilhada">Disciplina:</label>
            <select name="DisciplinaCompartilhada" id="DisciplinaCompartilhada" class="form-control" onchange="">
                <option disabled selected>Escolha</option>
                <?php
                $ExeQrBuscarDisciplinas = mysql_query("SELECT * FROM materias_disponiveis");
                if (mysql_num_rows($ExeQrBuscarDisciplinas) > 0) {
                    while ($ReturnDisciplinas = mysql_fetch_assoc($ExeQrBuscarDisciplinas)) {
                        ?>
                        <option value="<?php echo $ReturnDisciplinas[materia] ?>">
                            <?php echo $ReturnDisciplinas[materia] ?>
                        </option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
    </form>
    <?php
    /*
     * Nomes das tabela das salas no dia
     */
    $CheckAgendamentoSala1 = date('d_m_Y', strtotime($dataAula)) . "_sala1";
    $CheckAgendamentoSala2 = date('d_m_Y', strtotime($dataAula)) . "_sala2";
    $CheckAgendamentoSala3 = date('d_m_Y', strtotime($dataAula)) . "_sala3";
    $CheckAgendamentoSala4 = date('d_m_Y', strtotime($dataAula)) . "_sala4";
    $CheckAgendamentoSala5 = date('d_m_Y', strtotime($dataAula)) . "_sala5";
    $CheckAgendamentoSala6 = date('d_m_Y', strtotime($dataAula)) . "_sala6";
    /*
     * Query para procurar as tabelas das salas
     */
    $QuerySala1 = mysql_query("SHOW TABLES LIKE '$CheckAgendamentoSala1'");
    $QuerySala2 = mysql_query("SHOW TABLES LIKE '$CheckAgendamentoSala2'");
    $QuerySala3 = mysql_query("SHOW TABLES LIKE '$CheckAgendamentoSala3'");
    $QuerySala4 = mysql_query("SHOW TABLES LIKE '$CheckAgendamentoSala4'");
    $QuerySala5 = mysql_query("SHOW TABLES LIKE '$CheckAgendamentoSala5'");
    $QuerySala6 = mysql_query("SHOW TABLES LIKE '$CheckAgendamentoSala6'");
    ?>
    <form style="margin-top: 10px;" action="?acesso=AgendarCompartilhado" method="post">
        <div class="col-md-2">
            <!--Exibir a data com formato correto sem a nomenclatura do DB-->
            <label class="text-center">Dia Compartilhado</label>
            <select name="sala_selecionada" class="form-control">
                <option selected disabled>Escolha</option>
            </select>
            <div class="form-group text-center" style="padding-top: 2.5px;">
                <button type="submit" name="escolher" class="btn btn-success">
                    <span class="glyphicon glyphicon-check"></span>
                </button>
            </div>
        </div>
    </form>
</section>