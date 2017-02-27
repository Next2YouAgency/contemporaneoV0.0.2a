<table class="table-responsive table-striped text-center" style="width: 100%">
    <tr>
        <td colspan="13">Meses de entrada</td>
    </tr>
    <tr>
        <td>Dia</td>
        <td>Janeiro</td>
        <td>Fevereiro</td>
        <td>Março</td>
        <td>Abril</td>
        <td>Maio</td>
        <td>Junho</td>
        <td>Julho</td>
        <td>Agosto</td>
        <td>Setembro</td>
        <td>Outubro</td>
        <td>Novembro</td>
        <td>Dezembro</td>
    </tr>
    <?php
    $BuscarTodosPagamentos = mysql_query("SELECT data_confirmacao_dia AS dia_conf, data_confirmacao_mes AS mes_conf, data_confirmacao_ano AS ano_conf FROM pagamentos_efetuados ORDER BY data_confirmacao_dia ASC");
    if ($BuscarTodosPagamentos) {
        while ($ReturnDadosPagamentos = mysql_fetch_assoc($BuscarTodosPagamentos)) {
            ?>
            <tr>
                <td><?php echo $DataPagamentoDia = $ReturnDadosPagamentos['dia_conf'] ?></td>
                <td>
                    <?php
                    $PagamentosValores = mysql_query("SELECT sum(valor_pagamento) as total_pagamentos FROM pagamentos_efetuados WHERE data_confirmacao_dia = '$DataPagamentoDia'");
                    while ($ReturnTotalPagamento = mysql_fetch_assoc($PagamentosValores)) {
                        echo $_SESSION['total'] = trata_preco($ReturnTotalPagamento['total_pagamentos']);
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "Erro: " . mysql_error();
    }
    ?>
    <tr>
        <td colspan="1">
            <span>Total: </span>
        </td>
        <td colspan="">
            <span>
                <?php
                echo $_SESSION['total'];
                ?>
            </span>
        </td>
    </tr>
</table>