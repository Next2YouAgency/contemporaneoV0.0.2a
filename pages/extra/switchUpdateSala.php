<?php
switch ($tempoAula) {
    case 0.5 :
        $ExeQrUpdate1Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $horarioEntrada");
        $ExeQrUpdate1RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = $matricula WHERE entrada = $horarioEntrada");
        $ExeQrUpdate1RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $horarioEntrada");

        if ($compartilharAula == 1) {
            $ExeQrUpdate1RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $horarioEntrada");
            $ExeQrUpdate1RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $horarioEntrada");
            echo "<p>Aula registrada para compartilhar com outros alunos</p>";
        }
        if ($ExeQrUpdate1Registro) {
            ?>
            <div class="col-md-12">
                <p><b>Inserindo registro para acompanhamento na agenda... </b></p>
            </div>
            <?php
        } else {
            echo mysql_error();
        }

        break;
    case 1:
        $Entrada2 = $horarioEntrada + 0.5;
        $ExeQrUpdate1Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada2");
        $ExeQrUpdate1RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada2");
        $ExeQrUpdate1RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada2");

        if ($compartilharAula == 1) {
            $ExeQrUpdate1RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $horarioEntrada");
            $ExeQrUpdate2RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada2");
            $ExeQrUpdate1RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $horarioEntrada");
            $ExeQrUpdate2RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada2");
            echo "<p>Aula registrada para compartilhar com outros alunos</p>";
        }

        if ($ExeQrUpdate1Registro && $ExeQrUpdate2Registro) {
            ?>
            <div class="col-md-12">
                <p><b>Inserindo registro para acompanhamento na agenda... </b></p>
            </div>
            <?php
        } else {
            echo mysql_error();
        }

        break;
    case 1.5:
        $Entrada2 = $horarioEntrada + 0.5;
        $Entrada3 = $Entrada2 + 0.5;
        $ExeQrUpdate1Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada2");
        $ExeQrUpdate3Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada3");
        $ExeQrUpdate1RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada2");
        $ExeQrUpdate3RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada3");
        $ExeQrUpdate1RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada2");
        $ExeQrUpdate3RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada3");

        if ($compartilharAula == 1) {
            $ExeQrUpdate1RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $horarioEntrada");
            $ExeQrUpdate2RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada2");
            $ExeQrUpdate3RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada3");
            $ExeQrUpdate1RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $horarioEntrada");
            $ExeQrUpdate2RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada2");
            $ExeQrUpdate3RegistroCompartilharMAteria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada3");
            echo "<p>Aula registrada para compartilhar com outros alunos</p>";
        }

        if ($ExeQrUpdate1Registro && $ExeQrUpdate2Registro && $ExeQrUpdate3Registro) {
            ?>
            <div class="col-md-12">
                <p><b>Inserindo registro para acompanhamento na agenda... </b></p>
            </div>
            <?php
        } else {
            echo mysql_error();
        }

        break;
    case 2:
        $Entrada2 = $horarioEntrada + 0.5;
        $Entrada3 = $Entrada2 + 0.5;
        $Entrada4 = $Entrada3 + 0.5;
        $ExeQrUpdate1Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada2");
        $ExeQrUpdate3Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada3");
        $ExeQrUpdate4Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada4");
        $ExeQrUpdate1RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada2");
        $ExeQrUpdate3RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada3");
        $ExeQrUpdate4RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada4");

        $ExeQrUpdate1RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada2");
        $ExeQrUpdate3RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada3");
        $ExeQrUpdate4RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada4");

        if ($compartilharAula == 1) {
            $ExeQrUpdate1RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $horarioEntrada");
            $ExeQrUpdate2RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada2");
            $ExeQrUpdate3RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada3");
            $ExeQrUpdate4RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada4");
            $ExeQrUpdate1RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $horarioEntrada");
            $ExeQrUpdate2RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada2");
            $ExeQrUpdate3RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada3");
            $ExeQrUpdate4RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada4");
            echo "<p>Aula registrada para compartilhar com outros alunos</p>";
        }

        if ($ExeQrUpdate1Registro && $ExeQrUpdate2Registro && $ExeQrUpdate3Registro && $ExeQrUpdate4Registro) {
            ?>
            <div class="col-md-12">
                <p><b>Inserindo registro para acompanhamento na agenda... </b></p>
            </div>
            <?php
        } else {
            echo mysql_error();
        }

        break;
    case 2.5:
        $Entrada2 = $horarioEntrada + 0.5;
        $Entrada3 = $Entrada2 + 0.5;
        $Entrada4 = $Entrada3 + 0.5;
        $Entrada5 = $Entrada4 + 0.5;
        $ExeQrUpdate1Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada2");
        $ExeQrUpdate3Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada3");
        $ExeQrUpdate4Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada4");
        $ExeQrUpdate5Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada5");
        $ExeQrUpdate1RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada2");
        $ExeQrUpdate3RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada3");
        $ExeQrUpdate4RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada4");
        $ExeQrUpdate5RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada5");
        $ExeQrUpdate1RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada2");
        $ExeQrUpdate3RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada3");
        $ExeQrUpdate4RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada4");
        $ExeQrUpdate5RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada5");

        if ($compartilharAula == 1) {
            $ExeQrUpdate1RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $horarioEntrada");
            $ExeQrUpdate2RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada2");
            $ExeQrUpdate3RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada3");
            $ExeQrUpdate4RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada4");
            $ExeQrUpdate5RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada5");
            $ExeQrUpdate1RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $horarioEntrada");
            $ExeQrUpdate2RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada2");
            $ExeQrUpdate3RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada3");
            $ExeQrUpdate4RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada4");
            $ExeQrUpdate5RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada5");
            echo "<p>Aula registrada para compartilhar com outros alunos</p>";
        }

        if ($ExeQrUpdate1Registro && $ExeQrUpdate2Registro && $ExeQrUpdate3Registro && $ExeQrUpdate4Registro && $ExeQrUpdate5Registro) {
            ?>
            <div class="col-md-12">
                <p><b>Inserindo registro para acompanhamento na agenda... </b></p>
            </div>
            <?php
        } else {
            echo mysql_error();
        }

        break;
    case 3:
        $Entrada2 = $horarioEntrada + 0.5;
        $Entrada3 = $Entrada2 + 0.5;
        $Entrada4 = $Entrada3 + 0.5;
        $Entrada5 = $Entrada4 + 0.5;
        $Entrada6 = $Entrada5 + 0.5;
        $ExeQrUpdate1Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada2");
        $ExeQrUpdate3Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada3");
        $ExeQrUpdate4Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada4");
        $ExeQrUpdate5Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada5");
        $ExeQrUpdate6Registro = mysql_query("UPDATE $salaDeAula SET status = 1 WHERE entrada = $Entrada6");
        $ExeQrUpdate1RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada2");
        $ExeQrUpdate3RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada3");
        $ExeQrUpdate4RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada4");
        $ExeQrUpdate5RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada5");
        $ExeQrUpdate6RegistroProf = mysql_query("UPDATE $salaDeAula SET professor = '$professor' WHERE entrada = $Entrada6");

        $ExeQrUpdate1RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $horarioEntrada");
        $ExeQrUpdate2RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada2");
        $ExeQrUpdate3RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada3");
        $ExeQrUpdate4RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada4");
        $ExeQrUpdate5RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada5");
        $ExeQrUpdate6RegistroNome = mysql_query("UPDATE $salaDeAula SET aluno = '$matricula' WHERE entrada = $Entrada6");

        if ($compartilharAula == 1) {
            $ExeQrUpdate1RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $horarioEntrada");
            $ExeQrUpdate2RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada2");
            $ExeQrUpdate3RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada3");
            $ExeQrUpdate4RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada4");
            $ExeQrUpdate5RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada5");
            $ExeQrUpdate6RegistroCompartilhar = mysql_query("UPDATE $salaDeAula SET compartilhada = 1 WHERE entrada = $Entrada6");
            $ExeQrUpdate1RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $horarioEntrada");
            $ExeQrUpdate2RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada2");
            $ExeQrUpdate3RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada3");
            $ExeQrUpdate4RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada4");
            $ExeQrUpdate5RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada5");
            $ExeQrUpdate6RegistroCompartilharMateria = mysql_query("UPDATE $salaDeAula SET materia = '$materiaAula' WHERE entrada = $Entrada6");
            echo "<p>Aula registrada para compartilhar com outros alunos</p>";
        }

        if ($ExeQrUpdate1Registro && $ExeQrUpdate2Registro && $ExeQrUpdate3Registro && $ExeQrUpdate4Registro && $ExeQrUpdate5Registro && $ExeQrUpdate6Registro) {
            ?>
            <div class="col-md-12">
                <p><b>Inserindo registro para acompanhamento na agenda... </b></p>
            </div>
            <?php
        } else {
            echo mysql_error();
        }

        break;
}