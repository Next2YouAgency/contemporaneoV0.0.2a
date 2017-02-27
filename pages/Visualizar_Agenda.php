<link href="css/css-calendar/responsive-calendar.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
<script src="js/js-calendar/responsive-calendar.js"></script>
<div class="container col-md-12">
    <!-- Responsive calendar - START -->
    <div class="responsive-calendar">
        <div class="controls">
            <a class="pull-left" data-go="prev"><div class="btn btn-primary">Prev</div></a>
            <h4><span data-head-year></span> <span data-head-month></span></h4>
            <a class="pull-right" data-go="next"><div class="btn btn-primary">Next</div></a>
        </div>
        <h4 style="text-align:center">
            <a href="?acesso=Agendar_Horario" style="color:#008CBA;">
                <span class="glyphicon glyphicon-edit"> Agendar Horário</span>
            </a>
        </h4>
        <hr>
        <div class="day-headers">
            <div class="day header">Dom</div>
            <div class="day header">Seg</div>
            <div class="day header">Ter</div>
            <div class="day header">Qua</div>
            <div class="day header">Qui</div>
            <div class="day header">Sex</div>
            <div class="day header">Sáb</div>
        </div>
        <div class="days" data-group="days">

        </div>
    </div>
    <!-- Responsive calendar - END -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
    $(".responsive-calendar").responsiveCalendar({
    time: '<?php echo date("Y-m") ?>',
            events: {
            //Sintaxe para retornar dados: "2016-12-24": {"number": 5, "url": "http://w3widgets.com/responsive-slider"},

            //"2016-12-24": {"number": 1, "url": "responsive-slider"},
<?php
$conexao = mysql_connect("localhost", "root", "");
mysql_select_db("contemporaneo");

$exeQrBuscarAgenda = mysql_query("SELECT * FROM agenda_aulas");

if (mysql_num_rows($exeQrBuscarAgenda) > 0) {
    while ($resBuscarAgenda = mysql_fetch_assoc($exeQrBuscarAgenda)) {
        $QueryAgendaDia = "SELECT * FROM agenda_aulas WHERE data = '$resBuscarAgenda[data]'";
        $ExeQrAgendaDia = mysql_query($QueryAgendaDia);
        $totalRegistros = mysql_num_rows($ExeQrAgendaDia);
        for ($iRegistros = 1; $iRegistros <= $totalRegistros; $iRegistros++) {
            ?>
                        "<?php echo $resBuscarAgenda['data'] ?>": {"number": "<i data-toggle='modal' data-target='#modal<?php echo $resBuscarAgenda['data'] ?>' class='btn btn-sm' data-toggle='tooltip' data-placement='top' alt='Ver tudo' title='Ver tudo'><?php echo $iRegistros ?></i>", "event": "?evento=1"},
            <?php
        }
    }
}
?>
            }
    });
    }
    );
</script>
<?php
$ExeBuscarAgendaExibir = mysql_query("SELECT * FROM agenda_aulas");
if (mysql_num_rows($ExeBuscarAgendaExibir)) {
    while ($ResBuscarAgendaExibir = mysql_fetch_assoc($ExeBuscarAgendaExibir)) {
        ?>
        <div class="modal fade" id="modal<?php echo $ResBuscarAgendaExibir['data'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width:95%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Agenda de aulas para o dia: <?php echo date("d/m/Y", strtotime($ResBuscarAgendaExibir['data'])) ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center" style="padding:0">
                            <h4 style="font-size:16px">Entrada</h4>
                            <?php
                            $ExeSQLBuscarHorarios = mysql_query("SELECT * FROM sala1");
                            while ($ReturnHorarios = mysql_fetch_assoc($ExeSQLBuscarHorarios)) {
                                ?>
                                <div class="col-md-12" style="border:0.5px solid #ddd;padding-left:5px;">
                                    <?php echo $ReturnHorarios['exibir_entrada'] ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            <?php
                            for ($contSala = 1; $contSala <= 6; $contSala++) {
                                $NomeSalaExibir = date("d_m_Y", strtotime($ResBuscarAgendaExibir['data'])) . "_sala" . $contSala;
                                ?>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="padding-left:0;padding-right: 0;">
                                    <h4 class="text-center" style="border:0.1px solid #ddd">Sala <?php echo $contSala ?></h4>
                                    <?php
                                    $QueryAulasAgendadas = "SELECT * FROM agenda_aulas WHERE data = '$ResBuscarAgendaExibir[data]' AND sala = '$NomeSalaExibir' ORDER BY entrada";
                                    $ExeQrAulasAgendadas = mysql_query($QueryAulasAgendadas);
                                    if (mysql_num_rows($ExeQrAulasAgendadas) > 0) {
                                        $QueryOrdenarEntrada = "SELECT * FROM agenda_aulas WHERE sala = '$NomeSalaExibir' ORDER BY sala";
                                        $ExeSQLOrdenarEntrada = mysql_query($QueryOrdenarEntrada);
                                        while ($ResExibirAulasDia = mysql_fetch_assoc($ExeSQLOrdenarEntrada)) {
                                            $horarioEntrada = $ResExibirAulasDia['entrada'];
                                            $horarioSaida = $ResExibirAulasDia['saida'];
                                            $qtdHorario = $ResExibirAulasDia['qtd_hora'];
                                            $alturaCelula = $qtdHorario * 21;
                                            $CorSala = $ResExibirAulasDia['materia'];
                                            $salaDeAulaAgendada = $ResExibirAulasDia['sala'];
                                            /*
                                             * Cores e espaçamento (CSS)
                                             */
                                            include 'pages/includes/switchesSalasAgenda.php';
                                            ?>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="<?php echo $Style . $Height . $Spacing ?>border:0.5px solid #ddd">
                                                <?php echo lmWord($ResExibirAulasDia['nome_aluno'], 18) ?>
                                                <a href="?acesso=Exibir_Evento&Id=<?php echo $ResExibirAulasDia['id'] ?>" title="<?php echo $ResExibirAulasDia['materia'] ?>">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}