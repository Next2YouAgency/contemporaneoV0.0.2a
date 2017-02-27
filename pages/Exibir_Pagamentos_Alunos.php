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

    $QueryInsertPagamentos = "INSERT INTO pagamentos_efetuados (id,id_agendamento,matricula,nome_aluno,valor_pagamento,forma_pagamento,comprovante_pagamento,data_confirmacao_dia,data_confirmacao_mes,data_confirmacao_ano) VALUES (NULL, '$matriculaPagamento[IdAula]', '$matriculaPagamento[Matricula]', '$matriculaPagamento[NomeAluno]', '$matriculaPagamento[ValorPagamento]', '$matriculaPagamento[FormaPagamento]', '$matriculaPagamento[ComprovantePagamento]', '$matriculaPagamento[DataConfirmacaoDia]', '$matriculaPagamento[DataConfirmacaoMes]', '$matriculaPagamento[DataConfirmacaoAno]')";
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
    $pdf = new Cezpdf();
    $pdf->selectFont('cnf/pdf/fonts/Helvetica.afm');
    $pdf->ezText('Comprovante de pagamento', 20, array(justification => 'center', spacing => 2.0));
    $pdf->ezText($NomeResponsavel, 15, array(justification => 'left', spacing => 3.0));
    $mensagem = '
                <!--Core jQuery-->
                <script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>

                <!-- Latest compiled and minified JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

                <h3>Ol&aacute; ' . $NomeResponsavel . '</h3>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="col-xs-4 col-sm-6 col-md-8 col-lg-10">
                                <h4>Comprovante de pagamento da aula: ' . $DisciplinaAula . '</h4>
                                <p class="lead">
                                    
                                </p>
                                <p>Seu cadastro est&aacute; quase completo, para concluir, precisamos que confirme seu cadastro clicando no link abaixo:<br>
                                <a href="http://ssoffice.com.br/index.php?ativar=y&registro_pessoa=' . $reg_pessoa_codificado . '">Ativar cadastro</a>
                                </p>

                                <p>
                                        Caso o link acima n&atilde;o funcione, copie o link a seguir e cole na barra de endereço do seu navegador:
                                        http://ssoffice.com.br/index.php?ativar=y&registro_pessoa=' . $reg_pessoa_codificado . '
                                </p>

                        </div>
                </div>
                
        ';

    $enviar = sendMail('Cadastro no sistema SS Advogados', $mensagem, "Teste de envio (Sem HTML)", MAILUSER, SITENAME, $email_principal, $nome_cadastro);
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
                                    <input type="checkbox" name="selecionado<?php echo $ReturnPagamentos[matricula] ?>" id="selecionado1" onclick="AdicionarPagamentoMultiplo();" value="<?php echo $ResBuscarPagamentos['id'] ?>">
                                    <input type="hidden" name="selecionarMatricula" value="<?php echo $ReturnPagamentos[valor] ?>">
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
                                    <input type="checkbox" name="selecionado<?php echo $ReturnPagamentos[matricula] ?>" id="selecionado1" onclick="AdicionarPagamentoMultiplo();" value="<?php echo $ResBuscarPagamentos['id'] ?>">
                                    <input type="hidden" name="selecionarMatricula" value="<?php echo $ReturnPagamentos[valor] ?>">
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
                            <input type="checkbox" name="selecionado<?php echo $ReturnPagamentos[matricula] ?>" id="selecionado<?php echo $ReturnPagamentos[id] ?>" onclick="AdicionarPagamentoMultiplo<?php echo $ReturnPagamentos[id] ?>();" value="<?php echo $ResBuscarPagamentos['id'] ?>">
                            <input type="hidden" name="selecionarMatricula" id="selecionadoItem<?php echo $ReturnPagamentos[id] ?>" value="<?php echo $ReturnPagamentos[valor] ?>">
                            <input type="hidden" name="selecionarMatricula" id="Registro<?php echo $ReturnPagamentos[id] ?>" value="<?php echo $ReturnPagamentos[id] ?>">
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
<?php
