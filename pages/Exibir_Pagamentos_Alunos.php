<?php
if (isset($_POST['SalvarPagamentos'])) {
    $matriculaPagamento[IdAula] = $_POST['id_aula'];
    $matriculaPagamento[Matricula] = $_POST['NumeroMatricula'];
    $matriculaPagamento[NomeAluno] = $_POST['NomeAluno'];
    $matriculaPagamento[ValorPagamento] = $_POST['ValorPagamento'];
    $matriculaPagamento[FormaPagamento] = $_POST['FormaPagamento'];
    $matriculaPagamento[ComprovantePagamento] = $_POST['ComprovantePagamento'];
    $matriculaPagamento[DataConfirmacaoDia] = date('d');
    $matriculaPagamento[DataConfirmacaoMes] = date('m');
    $matriculaPagamento[DataConfirmacaoAno] = date('Y');
    $matriculaPagamento[DataConfirmacaoCompleto] = date('d-m-Y');

    $QueryInsertPagamentos = "INSERT INTO pagamentos_efetuados (id,id_agendamento,matricula,nome_aluno,valor_pagamento,forma_pagamento,comprovante_pagamento,data_confirmacao_dia,data_confirmacao_mes,data_confirmacao_ano,data_confirmacao_completo) VALUES (NULL, '$matriculaPagamento[IdAula]', '$matriculaPagamento[Matricula]', '$matriculaPagamento[NomeAluno]', '$matriculaPagamento[ValorPagamento]', '$matriculaPagamento[FormaPagamento]', '$matriculaPagamento[ComprovantePagamento]', '$matriculaPagamento[DataConfirmacaoDia]', '$matriculaPagamento[DataConfirmacaoMes]', '$matriculaPagamento[DataConfirmacaoAno]','$matriculaPagamento[DataConfirmacaoCompleto]')";
    $ExeQrInsertPagamentos = mysql_query($QueryInsertPagamentos);
    $QueryUpdateAgenda = "UPDATE agenda_aulas SET pagamento = 'sim', comprovante_pagamento = '$matriculaPagamento[ComprovantePagamento]' WHERE id = '$matriculaPagamento[IdAula]'";
    $ExeQrUpdateAgenda = mysql_query($QueryUpdateAgenda);
    if ($ExeQrInsertPagamentos && $ExeQrUpdateAgenda) {
        include 'parts/extra/ModalAvisoPagamentoOK.php';
    } else {
        echo $QueryInsertPagamentos;
        echo "<br>";
        echo $QueryUpdateAgenda;
        echo "<br>";
        echo mysql_error();
    }
}
if (isset($_POST['EnviarComprovante'])) {
    $EmailComprovante = $_POST['EmailComprovante'];
    $NomeResponsavel = $_POST['NomeResponsavel'];
    $NomeAluno = $_POST['NomeAluno'];
    $DescricaoAula = $_POST['DescricaoAula'];
    $DataAula = $_POST['DataAula'];
    $ProfessorAula = $_POST['ProfessorAula'];
    $DisciplinaAula = $_POST['DisciplinaAula'];
    $QtdHoraAula = $_POST['QtdHoraAula'];
    $ValorAula = $_POST['ValorAula'];
    $DataComprovante;
}
?>
<script src="js/Pagamentos/Cheques.js"></script>
<script src="js/Pagamentos/returnPagamentoMultiplo.js"></script>
<section class="col-md-12">
    <h3>Pagamentos dos Alunos</h3>
    <form action="?acesso=Exibir_Pagamentos_Alunos" method="post">
        <div class="form-group col-md-3">
            <input type="number" name="matricula_aluno" placeholder="Matrícula Aluno" class="form-control" value="<?php
            if (isset($_POST['matricula_aluno'])):echo $_POST['matricula_aluno'];
            endif;
            ?>">
        </div>
        <div class="form-group col-md-6">
            <input type="text" name="nome_responsavel_pagamento" placeholder="Nome do Responsável pelo pagamento" class="form-control" value="<?php
            if (isset($_POST['nome_responsavel_pagamento'])):echo $_POST['nome_responsavel_pagamento'];
            endif;
            ?>">
        </div>
        <div class="form-group col-md-3">
            <button type="submit" name="buscar" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </div>
    </form>
</section>
<section class="col-md-12" style="padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
    <table class="table table-bordered table-responsive table-striped text-center">
        <form action="?acesso=Exibir_Pagamentos_Alunos" method="post">
            <tr>
                <td>Selecionar</td>
                <td>Matrícula</td>
                <td>Resp Pagamento</td>
                <td>Aluno</td>
                <td>Data/Aula</td>
                <td>Prof</td>
                <td>Inicio</td>
                <td>Tempo</td>
                <td>Valor</td>
                <td>Pagamento</td>
                <td>Desconto</td>
            </tr>
            <?php
            if (isset($_POST['buscar'])) {
                if (!empty($_POST['matricula_aluno'])) {
                    $BuscarPagamentos = $_POST['matricula_aluno'];
                    $ExeQrBuscarPagamentos = mysql_query("SELECT * FROM agenda_aulas WHERE matricula_aluno = $BuscarPagamentos");
                    if (mysql_num_rows($ExeQrBuscarPagamentos) >= 1) {
                        while ($ResBuscarPagamentos = mysql_fetch_assoc($ExeQrBuscarPagamentos)) {
                            $ReturnPagamentos[id] = $ResBuscarPagamentos['id'];
                            $ReturnPagamentos[matricula] = $ResBuscarPagamentos['matricula_aluno'];
                            $ReturnPagamentos[responsavel_pagamento] = $ResBuscarPagamentos['responsavel_pagamento'];
                            $ReturnPagamentos[nome_aluno] = $ResBuscarPagamentos['nome_aluno'];
                            $ReturnPagamentos[data] = $ResBuscarPagamentos['data'];
                            $ReturnPagamentos[prof] = $ResBuscarPagamentos['prof'];
                            $ReturnPagamentos[entrada] = $ResBuscarPagamentos['entrada'];
                            $ReturnPagamentos[qtd_hora] = $ResBuscarPagamentos['qtd_hora'];
                            $ReturnPagamentos[valor] = $ResBuscarPagamentos['valor'];
                            $ReturnPagamentos[pagamento] = $ResBuscarPagamentos['pagamento'];
                            $ReturnPagamentos[desconto] = $ResBuscarPagamentos['desconto'];
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    if ($ReturnPagamentos[pagamento] == "nao") {
                                        ?>
                                        <input type="checkbox" name="selecionado<?php echo $ReturnPagamentos[matricula] ?>" id="selecionado1" onclick="AdicionarPagamentoMultiplo();" value="<?php echo $ResBuscarPagamentos['valor'] ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <i class="glyphicon glyphicon-check text-success" title="Pagamento já efetuado"></i>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td><?php echo $ReturnPagamentos[matricula] ?></td>
                                <td><?php echo $ReturnPagamentos[responsavel_pagamento] ?></td>
                                <td><?php echo $ReturnPagamentos[nome_aluno] ?></td>
                                <td><?php echo $ReturnPagamentos[data] ?></td>
                                <td><?php echo $ReturnPagamentos[prof] ?></td>
                                <td><?php echo $ReturnPagamentos[entrada] ?></td>
                                <td><?php echo $ReturnPagamentos[qtd_hora] ?></td>
                                <td><?php echo $ReturnPagamentos[valor] ?></td>
                                <td>
                                    <?php
                                    if ($ReturnPagamentos[pagamento] == "nao") {
                                        ?>
                                        <button type="button" name="alterar_pagamento" id="alterar_pagamento<?php echo $ResBuscarPagamentos[id] ?>" data-toggle="modal" data-target="#AlterarPagamento<?php echo $ReturnPagamentos['id'] ?>" class="btn-adn" title="Alterar">
                                            <span class="glyphicon glyphicon-transfer"></span>
                                        </button>
                                        <button type="button" id="alterar_pagamento" data-toggle="modal" data-target="#GerarCobranca<?php echo $ReturnPagamentos['id'] ?>" class="btn-warning" title="Gerar Cobrança">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type = "button" name = "alterar_pagamento" id = "alterar_pagamento" data-toggle = "modal" data-target = "#EnviarComprovante<?php echo $ReturnPagamentos['id'] ?>" class = "btn-success" title = "Enviar Comprovante">
                                            <span class = "glyphicon glyphicon-envelope"></span>
                                        </button>
                                        <button type = "button" name = "alterar_pagamento" id = "alterar_pagamento" data-toggle = "modal" data-target = "#VisualizarStatus<?php echo $ReturnPagamentos['id'] ?>" class = "btn-info" title = "Ver Detalhes">
                                            <span class = "glyphicon glyphicon-eye-open"></span>
                                        </button>
                                        <?php
                                    }
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    if ($ReturnPagamentos[desconto]) {
                                        echo $ReturnPagamentos[desconto];
                                    } else {
                                        echo "0";
                                    }
                                    ?> %
                                </td>
                            </tr>
                            <?php
                            include 'parts/extra/ModalAlterarPagamento.php';
                            include 'parts/extra/ModalGerarCobranca.php';
                            include 'parts/extra/ModalEnviarComprovante.php';
                            include 'parts/extra/ModalVisualizarStatus.php';
                        }
                    }
                } else if (isset($_POST['nome_responsavel_pagamento'])) {
                    $BuscarPagamentosNome = $_POST['nome_responsavel_pagamento'];
                    $ExeQrBuscarPagamentos = mysql_query("SELECT * FROM agenda_aulas WHERE responsavel_pagamento LIKE'%$BuscarPagamentosNome%'");
                    if (mysql_num_rows($ExeQrBuscarPagamentos) > 0) {
                        while ($ResBuscarPagamentos = mysql_fetch_assoc($ExeQrBuscarPagamentos)) {
                            $ReturnPagamentos[id] = $ResBuscarPagamentos['id'];
                            $ReturnPagamentos[matricula] = $ResBuscarPagamentos['matricula_aluno'];
                            $ReturnPagamentos[responsavel_pagamento] = $ResBuscarPagamentos['responsavel_pagamento'];
                            $ReturnPagamentos[nome_aluno] = $ResBuscarPagamentos['nome_aluno'];
                            $ReturnPagamentos[data] = $ResBuscarPagamentos['data'];
                            $ReturnPagamentos[prof] = $ResBuscarPagamentos['prof'];
                            $ReturnPagamentos[entrada] = $ResBuscarPagamentos['entrada'];
                            $ReturnPagamentos[qtd_hora] = $ResBuscarPagamentos['qtd_hora'];
                            $ReturnPagamentos[valor] = $ResBuscarPagamentos['valor'];
                            $ReturnPagamentos[pagamento] = $ResBuscarPagamentos['pagamento'];
                            $ReturnPagamentos[desconto] = $ResBuscarPagamentos['desconto'];
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    if ($ReturnPagamentos[pagamento] == "nao") {
                                        ?>
                                        <input type="checkbox" name="selecionado<?php echo $ReturnPagamentos[matricula] ?>" id="selecionado1" onclick="AdicionarPagamentoMultiplo();" value="<?php echo $ResBuscarPagamentos['valor'] ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <i class="glyphicon glyphicon-check text-success" title="Pagamento já efetuado"></i>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td><?php echo $ReturnPagamentos[matricula] ?></td>
                                <td><?php echo $ReturnPagamentos[responsavel_pagamento] ?></td>
                                <td><?php echo $ReturnPagamentos[nome_aluno] ?></td>
                                <td><?php echo $ReturnPagamentos[data] ?></td>
                                <td><?php echo $ReturnPagamentos[prof] ?></td>
                                <td><?php echo $ReturnPagamentos[entrada] ?></td>
                                <td><?php echo $ReturnPagamentos[qtd_hora] ?></td>
                                <td><?php echo $ReturnPagamentos[valor] ?></td>
                                <td>
                                    <?php
                                    if ($ReturnPagamentos[pagamento] == "nao") {
                                        ?>
                                        <button type="button" name="alterar_pagamento" id="alterar_pagamento<?php echo $ResBuscarPagamentos[id] ?>" data-toggle="modal" data-target="#AlterarPagamento<?php echo $ReturnPagamentos['id'] ?>" class="btn-adn" title="Alterar">
                                            <span class="glyphicon glyphicon-transfer"></span>
                                        </button>
                                        <button type="button" id="alterar_pagamento" data-toggle="modal" data-target="#GerarCobranca<?php echo $ReturnPagamentos['id'] ?>" class="btn-warning" title="Gerar Cobrança">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type = "button" name = "alterar_pagamento" id = "alterar_pagamento" data-toggle = "modal" data-target = "#EnviarComprovante<?php echo $ReturnPagamentos['id'] ?>" class = "btn-success" title = "Enviar Comprovante">
                                            <span class = "glyphicon glyphicon-envelope"></span>
                                        </button>
                                        <button type = "button" name = "alterar_pagamento" id = "alterar_pagamento" data-toggle = "modal" data-target = "#VisualizarStatus<?php echo $ReturnPagamentos['id'] ?>" class = "btn-info" title = "Ver Detalhes">
                                            <span class = "glyphicon glyphicon-eye-open"></span>
                                        </button>
                                        <?php
                                    }
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    if ($ReturnPagamentos[desconto]) {
                                        echo $ReturnPagamentos[desconto];
                                    } else {
                                        echo "0";
                                    }
                                    ?> %
                                </td>
                            </tr>
                            <?php
                            include 'parts/extra/ModalAlterarPagamento.php';
                            include 'parts/extra/ModalGerarCobranca.php';
                            include 'parts/extra/ModalEnviarComprovante.php';
                            include 'parts/extra/ModalVisualizarStatus.php';
                        }
                    } else {
                        echo '<script>alert("Nome do Responsável pelo pagamento não encontrado!")</script>';
                    }
                }
            } else {
                $ExeQrBuscarPagamentos = mysql_query("SELECT * FROM agenda_aulas");
                while ($ResBuscarPagamentos = mysql_fetch_assoc($ExeQrBuscarPagamentos)) {
                    $ReturnPagamentos[id] = $ResBuscarPagamentos['id'];
                    $ReturnPagamentos[matricula] = $ResBuscarPagamentos['matricula_aluno'];
                    $ReturnPagamentos[responsavel_pagamento] = $ResBuscarPagamentos['responsavel_pagamento'];
                    $ReturnPagamentos[nome_aluno] = $ResBuscarPagamentos['nome_aluno'];
                    $ReturnPagamentos[data] = $ResBuscarPagamentos['data'];
                    $ReturnPagamentos[prof] = $ResBuscarPagamentos['prof'];
                    $ReturnPagamentos[entrada] = $ResBuscarPagamentos['entrada'];
                    $ReturnPagamentos[qtd_hora] = $ResBuscarPagamentos['qtd_hora'];
                    $ReturnPagamentos[valor] = $ResBuscarPagamentos['valor'];
                    $ReturnPagamentos[pagamento] = $ResBuscarPagamentos['pagamento'];
                    $ReturnPagamentos[desconto] = $ResBuscarPagamentos['desconto'];
                    ?>
                    <tr>
                        <td>
                            <?php
                            if ($ReturnPagamentos[pagamento] == "nao") {
                                ?>
                                <input type="checkbox" name="selecionado<?php echo $ReturnPagamentos[matricula] ?>" id="selecionado1" onclick="AdicionarPagamentoMultiplo();" value="<?php echo $ResBuscarPagamentos['valor'] ?>">
                                <?php
                            } else {
                                ?>
                                <i class="glyphicon glyphicon-check text-success" title="Pagamento já efetuado"></i>
                                <?php
                            }
                            ?>
                        </td>
                        <td><?php echo $ReturnPagamentos[matricula] ?></td>
                        <td><?php echo $ReturnPagamentos[responsavel_pagamento] ?></td>
                        <td><?php echo $ReturnPagamentos[nome_aluno] ?></td>
                        <td><?php echo $ReturnPagamentos[data] ?></td>
                        <td><?php echo $ReturnPagamentos[prof] ?></td>
                        <td><?php echo $ReturnPagamentos[entrada] ?></td>
                        <td><?php echo $ReturnPagamentos[qtd_hora] ?></td>
                        <td><?php echo $ReturnPagamentos[valor] ?></td>
                        <td>
                            <?php
                            if ($ReturnPagamentos[pagamento] == "nao") {
                                ?>
                                <button type="button" name="alterar_pagamento" id="alterar_pagamento<?php echo $ResBuscarPagamentos[id] ?>" data-toggle="modal" data-target="#AlterarPagamento<?php echo $ReturnPagamentos['id'] ?>" class="btn-adn" title="Alterar">
                                    <span class="glyphicon glyphicon-transfer"></span>
                                </button>
                                <button type="button" id="alterar_pagamento" data-toggle="modal" data-target="#GerarCobranca<?php echo $ReturnPagamentos['id'] ?>" class="btn-warning" title="Gerar Cobrança">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </button>
                                <?php
                            } else {
                                ?>
                                <button type = "button" name = "alterar_pagamento" id = "alterar_pagamento" data-toggle = "modal" data-target = "#EnviarComprovante<?php echo $ReturnPagamentos['id'] ?>" class = "btn-success" title = "Enviar Comprovante">
                                    <span class = "glyphicon glyphicon-envelope"></span>
                                </button>
                                <button type = "button" name = "alterar_pagamento" id = "alterar_pagamento" data-toggle = "modal" data-target = "#VisualizarStatus<?php echo $ReturnPagamentos['id'] ?>" class = "btn-info" title = "Ver Detalhes">
                                    <span class = "glyphicon glyphicon-eye-open"></span>
                                </button>
                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php
                            if ($ReturnPagamentos[desconto]) {
                                echo $ReturnPagamentos[desconto];
                            } else {
                                echo "0";
                            }
                            ?> %
                        </td>
                    </tr>
                    <?php
                    include 'parts/extra/ModalAlterarPagamento.php';
                    include 'parts/extra/ModalGerarCobranca.php';
                    include 'parts/extra/ModalEnviarComprovante.php';
                    include 'parts/extra/ModalVisualizarStatus.php';
                }
            }
            ?>
            <script>
                function soma(e) {
                    var total = 0;
                    var valores = $('input[type="checkbox"]:checked');
                    $.each(valores, function (i, v) {
                        total = parseFloat(total) + parseFloat($(v).val());
                    });

                    $("#totalPagamento").val(total);
                }

                $('input[type="checkbox"]').on('change', soma);
            </script>
            <tr><td colspan="11"></td></tr>
            <tr>
                <td colspan="11"><span class="col-md-12 text-left">Total selecionado: </span></td>
            </tr>
            <tr>
                <td colspan="11">
                    <div class="col-md-3">
                        <input type="text" name="totalPagamento" id="totalPagamento" class="form-control">
                    </div>
                    <div class="col-md-9 text-left">
                        <button type="submit" name="PagarMultiplo" class="btn btn-success"><i class="glyphicon glyphicon-floppy-saved"></i></button>
                        <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i></button>
                    </div>
                </td>
            </tr>
        </form>
    </table>
</section>
<div id="modal_alterar_pagamento"></div>