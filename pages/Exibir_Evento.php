<?php
$idAula = $_GET['Id'];
$QueryBuscarAgenda = "SELECT * FROM agenda_aulas WHERE id = '$idAula'";
$ExeQrBuscarAgenda = mysql_query($QueryBuscarAgenda);

if (mysql_num_rows($ExeQrBuscarAgenda) > 0) {
    while ($resEventoId = mysql_fetch_assoc($ExeQrBuscarAgenda)) {
        ?>
        <div class="col-md-10 col-md-push-1">
            <h4>Dia da aula: <?php echo date('d/m/Y', strtotime($resEventoId['data'])) ?></h4>
            <div class="col-md-12">
                <?php
                include_once 'pages/includes/switchHoraEntradaSaida.php';
                $resultadoHorario = $resEventoId['saida'] - $resEventoId['entrada'];
                switch ($resultadoHorario) {
                    case 0.5: $ExibirResultadoHorario = "0:30";
                        break;
                    case 1: $ExibirResultadoHorario = "1:00";
                        break;
                    case 1.5: $ExibirResultadoHorario = "1:30";
                        break;
                    case 2: $ExibirResultadoHorario = "2:00";
                        break;
                    case 2.5: $ExibirResultadoHorario = "2:30";
                        break;
                    case 3: $ExibirResultadoHorario = "3:00";
                        break;
                }
                ?>
                Matrícula: <?php echo $resEventoId['matricula_aluno']; ?><br>
                Nome do aluno: <?php echo $resEventoId['nome_aluno']; ?><br>
                Aula de: <?php echo $resEventoId['materia']; ?><br>
                Entrada: <?php echo $horaEntrada; ?><br>
                Saída: <?php echo $horaSaida; ?><br>
                Duração: <?php echo $ExibirResultadoHorario; ?><br>
                Professor: <?php echo $resEventoId['prof']; ?>
            </div>
        </div>
        <?php
    }
}