<?php
if (isset($_POST['AtualizarProfessor'])) {
    $idProfessor = $_POST['IdProfessor'];
    $nome_professor = $_POST['nome_professor'];
    $materia = $_POST['materia_principal'];
    $telefone_principal = $_POST['telefone_principal'];
    $telefone_contato = $_POST['telefone_contato'];
    $cep_endereco = $_POST['cep_endereco'];
    $endereco_completo = $_POST['endereco_completo'];
    $numero_endereco = $_POST['numero_endereco'];
    $bairro_endereco = $_POST['bairro_endereco'];
    $cidade_endereco = $_POST['cidade_endereco'];
    $estado_endereco = $_POST['estado_endereco'];
    $complemento_endereco = $_POST['complemento_endereco'];
    $banco_professor = $_POST['banco_professor'];
    $agencia_banco_professor = $_POST['agencia_banco_professor'];
    $dig_agencia_banco_professor = $_POST['dig_agencia_banco_professor'];
    $conta_banco_professor = $_POST['conta_banco_professor'];
    $valor_hora = $_POST['valor_hora'];
    $valor_hora_res = $_POST['valor_hora_res'];
    $dia_pagamento = $_POST['dia_pagamento'];

    $QueryUpdateDadosProfessor = "UPDATE professores SET nome = '$nome_professor',"
        . "materia = '$materia',"
        . "telefone_principal = '$telefone_principal',"
        . "telefone_contato = '$telefone_contato',"
        . "cep_endereco = '$cep_endereco',"
        . "endereco_completo = '$endereco_completo',"
        . "numero_endereco = '$numero_endereco',"
        . "bairro_endereco = '$bairro_endereco',"
        . "cidade_endereco = '$cidade_endereco',"
        . "estado_endereco = '$estado_endereco',"
        . "complemento_endereco = '$complemento_endereco',"
        . "banco_professor = '$banco_professor',"
        . "agencia_banco_professor = '$agencia_banco_professor',"
        . "dig_agencia_banco_professor = '$dig_agencia_banco_professor',"
        . "conta_banco_professor = '$conta_banco_professor',"
        . "valor_hora = '$valor_hora',"
        . "valor_hora_res = '$valor_hora_res',"
        . "dia_pagamento = '$dia_pagamento' WHERE id = $idProfessor";
    $ExeQrUpdateDadosProfessor = mysql_query($QueryUpdateDadosProfessor);

    if ($ExeQrUpdateDadosProfessor) {
        include_once 'parts/extra/ModalAlterarProfessorOK.php';
    } else {
        ?>
        <script>alert("Deu ruim! <?php echo mysql_error() ?>")</script>
        <?php
    }
}
?>
<section class="col-md-12">
    <h2>Consultar Professores</h2>
    <form class="col-md-8" method="post" action="?acesso=Consultar_Professores">
        <div class="form-group col-md-3">
            <input type="number" value="<?php
            if (isset($_POST['cadastro_professor'])):echo $_POST['cadastro_professor'];
            endif;
            ?>" name="cadastro_professor" id="cadastro_professor" class="form-control" placeholder="Codigo Professor">
        </div>
        <div class="form-group col-md-8">
            <input type="text" value="<?php
            if (isset($_POST['nome_do_professor'])):echo $_POST['nome_do_professor'];
            endif;
            ?>" name="nome_do_professor" id="nome_do_professor" class="form-control" placeholder="Nome do Professor">
        </div>
        <div class="col-md-1">
            <button type="submit" name="buscarProfessor" class="btn btn-default">
                <span class="glyphicon glyphicon-search" style="color:#000;font-size: 17px"></span>
            </button>
        </div>
    </form>
</section>
<section id="returnPesquisaAluno" class="col-md-12" style="margin-top: 10px">
    <?php
    if (isset($_POST['buscarProfessor'])) {
        if ($_POST['cadastro_professor']) {
            $buscarProfessor = $_POST['cadastro_professor'];
            $ExeQrBuscarProfessor = mysql_query("SELECT * FROM professores WHERE id = $buscarProfessor");
            ?>
            <table class="table table-striped table-responsive">
                <tr>
                    <td>Código</td>
                    <td>Nome</td>
                    <td>Disciplina</td>
                    <td>Editar/Visualizar</td>
                </tr>
                <?php
                while ($resBuscarProfessor = mysql_fetch_assoc($ExeQrBuscarProfessor)) {
                    ?>
                    <tr>
                        <td><?php echo $resBuscarProfessor['id'] ?></td>
                        <td><?php echo $resBuscarProfessor['nome'] ?></td>
                        <td><?php echo $resBuscarProfessor['materia'] ?></td>
                        <td><span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesProfessor<?php echo $resBuscarProfessor['id'] ?>"></span></td>
                    </tr>
                    <!--Modal para consultar os dados do aluno -->
                    <?php
                    include 'parts/extra/ModalDetalhesProfessor.php';
                }
                ?>
            </table>
            <?php
        } else if ($_POST['nome_do_professor']) {
            $buscarProfessor = $_POST['nome_do_professor'];
            $ExeQrBuscarProfessor = mysql_query("SELECT * FROM professores WHERE nome LIKE '%" . $buscarProfessor . "%'");
            if (mysql_num_rows($ExeQrBuscarProfessor) > 0) {
                ?>
                <table class="table table-striped table-responsive">
                    <tr>
                        <td>Código</td>
                        <td>Nome</td>
                        <td>Disciplina</td>
                        <td>Editar/Visualizar</td>
                    </tr>
                    <?php
                    while ($resBuscarProfessor = mysql_fetch_assoc($ExeQrBuscarProfessor)) {
                        ?>
                        <tr>
                            <td><?php echo $resBuscarProfessor['id'] ?></td>
                            <td><?php echo $resBuscarProfessor['nome'] ?></td>
                            <td><?php echo $resBuscarProfessor['materia'] ?></td>
                            <td><span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesProfessor<?php echo $resBuscarProfessor['id'] ?>"></span></td>
                        </tr>
                        <!--Modal para consultar os dados do aluno -->
                        <?php
                        include 'parts/extra/ModalDetalhesProfessor.php';
                    }
                    ?>
                </table>
                <?php
            }
        } else {
            $ExeQrBuscarProfessor = mysql_query("SELECT * FROM professores");
            if (mysql_num_rows($ExeQrBuscarProfessor) > 0) {
                ?>
                <table class="table table-striped table-responsive">
                    <tr>
                        <td>Código</td>
                        <td>Nome</td>
                        <td>Disciplina</td>
                        <td>Editar/Visualizar</td>
                    </tr>
                    <?php
                    while ($resBuscarProfessor = mysql_fetch_assoc($ExeQrBuscarProfessor)) {
                        ?>
                        <tr>
                            <td><?php echo $resBuscarProfessor['id'] ?></td>
                            <td><?php echo $resBuscarProfessor['nome'] ?></td>
                            <td><?php echo $resBuscarProfessor['materia'] ?></td>
                            <td>
                                <span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesProfessor<?php echo $resBuscarProfessor['id'] ?>"></span>
                            </td>
                        </tr>
                        <!--Modal para consultar os dados do aluno -->
                        <?php
                        include 'parts/extra/ModalDetalhesProfessor.php';
                    }
                    ?>
                </table>
                <?php
            }
        }
    } else {
        $ExeQrBuscarProfessor = mysql_query("SELECT * FROM professores");
        if (mysql_num_rows($ExeQrBuscarProfessor) > 0) {
            ?>
            <table class="table table-striped table-responsive">
                <tr>
                    <td>Código</td>
                    <td>Nome</td>
                    <td>Disciplina</td>
                    <td>Editar/Visualizar</td>
                </tr>
                <?php
                while ($resBuscarProfessor = mysql_fetch_assoc($ExeQrBuscarProfessor)) {
                    ?>
                    <tr>
                        <td><?php echo $resBuscarProfessor['id'] ?></td>
                        <td><?php echo $resBuscarProfessor['nome'] ?></td>
                        <td><?php echo $resBuscarProfessor['materia'] ?></td>
                        <td>
                            <span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesProfessor<?php echo $resBuscarProfessor['id'] ?>"></span>
                        </td>
                    </tr>
                    <?php
                    include 'parts/extra/ModalDetalhesProfessor.php';
                }
                ?>
            </table>
            <?php
        }
    }
    ?>
</section>