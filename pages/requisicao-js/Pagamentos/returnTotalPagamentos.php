<?php
#Versão com ajax
if (isset($_GET['TotalPagamento'])) {
    include '../../cnf/config.php';
    $RegistroPagamento = $_GET['Registro'];
    $QueryBuscarPagamentosNovo = "SELECT * FROM agenda_aulas WHERE id = '$RegistroPagamento'";
    $ExeQrBuscarPagamentosNovo = mysql_query($QueryBuscarPagamentosNovo);
    sleep(1);
    $CountBuscarRegistros = mysql_affected_rows($conexao);
    if($CountBuscarRegistros > 0) {
        while ($ReturnPagamentosNovo = mysql_fetch_assoc($ExeQrBuscarPagamentosNovo)) {
            $TotalPagamentoSelecionado = $ReturnPagamentosNovo['valor'];
            ?>
            <input type="text" name="totalPagamento" id="totalPagamento" class="form-control" value="<?php $ReturnPagamentosNovo['valor'] ?>">
            <?php
        }
    }
}

    