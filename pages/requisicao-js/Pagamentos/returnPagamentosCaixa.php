<?php
#Versão com ajax
if (isset($_GET['MesSelecionado'])) {
    include '../../../cnf/config.php';
    $MesEscolhido = $_GET['MesSelecionado'];
    sleep(2);
    ?>
    <table class="table-responsive table-striped text-center" style="width: 100%">
        <tr>
            <td>Dia</td>
            <td>Valor</td>
        </tr>
        <?php
        $BuscarMesPagamentos = mysql_query("SELECT data_confirmacao_mes FROM pagamentos_efetuados WHERE data_confirmacao_mes = '$MesEscolhido'");
        if ($BuscarMesPagamentos) {
            $BuscarTodosPagamentos = mysql_query("SELECT data_confirmacao_completo AS tudo, data_confirmacao_dia AS dia_conf, data_confirmacao_mes AS mes_conf, data_confirmacao_ano AS ano_conf FROM pagamentos_efetuados GROUP BY dia_conf,mes_conf,ano_conf,tudo ORDER BY dia_conf ASC");
            if ($BuscarTodosPagamentos) {
                while ($ReturnDadosPagamentos = mysql_fetch_assoc($BuscarTodosPagamentos)) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            echo $DataPagamentoDia = $ReturnDadosPagamentos['dia_conf']
                            ?>
                        </td>
                        <td>
                            <?php
                            $PagamentosValores = mysql_query("SELECT sum(valor_pagamento) as total_pagamentos FROM pagamentos_efetuados WHERE data_confirmacao_dia = '$DataPagamentoDia' AND data_confirmacao_mes = '$MesEscolhido' GROUP BY data_confirmacao_dia");
                            if ($PagamentosValores) {
                                while ($ReturnTotalPagamento = mysql_fetch_assoc($PagamentosValores)) {
                                    echo "R$ " . trata_preco($ReturnTotalPagamento['total_pagamentos']);

                                    $TotalPagamentosMes = mysql_query("SELECT sum(valor_pagamento) as total_pagamentos FROM pagamentos_efetuados WHERE data_confirmacao_mes = '$MesEscolhido'");
                                    if ($TotalPagamentosMes) {
                                        while ($ResTotalMes = mysql_fetch_assoc($TotalPagamentosMes)) {
                                            $_SESSION['Mes'] = $ResTotalMes['total_pagamentos'];
                                            $ExibirTotal = $_SESSION['Mes'];
                                        }
                                    }
                                }
                            } else {
                                
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            }
        }
        ?>
        <tr>
            <td colspan="1">
                <span>Total: </span>
            </td>
            <td colspan="">
                <span>
                    <?php
                    echo "R$ " . trata_preco($ExibirTotal);
                    ?>
                </span>
            </td>
        </tr>
    </table>
    <?php
}