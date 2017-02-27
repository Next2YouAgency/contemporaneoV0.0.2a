<section class="col-md-11 col-md-push-1">
    <h2>Consultar Alunos</h2>
    <form class="col-md-8" method="post" action="?acesso=Consultar_Alunos">
        <div class="form-group col-md-3">
            <input type="number" value="<?php
            if (isset($_POST['numero_matricula'])):echo $_POST['numero_matricula'];
            endif;
            ?>" name="numero_matricula" id="numero_matricula" class="form-control" placeholder="Matrícula">
        </div>
        <div class="form-group col-md-8">
            <input type="text" value="<?php
            if (isset($_POST['nome_do_aluno'])):echo $_POST['nome_do_aluno'];
            endif;
            ?>" name="nome_do_aluno" id="nome_do_aluno" class="form-control" placeholder="Nome do Aluno">
        </div>
        <div class="col-md-1">
            <button type="submit" name="buscarAluno" class="btn btn-large">
                <span class="glyphicon glyphicon-search" style="color:#000;font-size: 17px"></span>
            </button>
        </div>
    </form>
</section>
<section id="returnPesquisaAluno" class="col-md-12" style="margin-top: 10px">
    <?php
    if (isset($_POST['buscarAluno'])) {
        if ($_POST['numero_matricula']) {
            $buscarAluno = $_POST['numero_matricula'];
            $QueryBuscarAluno = "SELECT * FROM alunos WHERE matricula_aluno = '$buscarAluno'";
            $ExeQrBuscarAluno = mysql_query($QueryBuscarAluno);
            if (mysql_num_rows($ExeQrBuscarAluno) > 0) {
                ?>
                <table class="table table-striped table-responsive col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <tr>
                        <td>Matrícula</td>
                        <td>Nome</td>
                        <td>Telefone</td>
                        <td>Editar/Visualizar</td>
                    </tr>
                    <?php
                    while ($resBuscarAluno = mysql_fetch_assoc($ExeQrBuscarAluno)) {
                        ?>
                        <tr>
                            <td><?php echo $resBuscarAluno['matricula_aluno'] ?></td>
                            <td><?php echo $resBuscarAluno['nome_aluno'] ?></td>
                            <td><?php echo $resBuscarAluno['telefone_aluno'] ?></td>
                            <td><span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesAluno<?php echo $resBuscarAluno['matricula_aluno'] ?>"></span></td>
                        </tr>
                        <!--Modal para consultar os dados do aluno -->
                        <?php
                        include 'parts/extra/ModalDetalhesAluno.php';
                    }
                    ?>
                </table>
                <?php
            }
        } else if ($_POST['nome_do_aluno']) {
            $buscarAluno = $_POST['nome_do_aluno'];
            $QueryBuscarAluno = "SELECT * FROM alunos WHERE nome_aluno LIKE '%" . $buscarAluno . "%'";
            $ExeQrBuscarAluno = mysql_query($QueryBuscarAluno);
            if (mysql_num_rows($ExeQrBuscarAluno) > 0) {
                ?>
                <table class="table table-striped table-responsive col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <tr>
                        <td>Matrícula</td>
                        <td>Nome</td>
                        <td>Telefone</td>
                        <td>Editar/Visualizar</td>
                    </tr>
                    <?php
                    while ($resBuscarAluno = mysql_fetch_assoc($ExeQrBuscarAluno)) {
                        ?>
                        <tr>
                            <td><?php echo $resBuscarAluno['matricula_aluno'] ?></td>
                            <td><?php echo $resBuscarAluno['nome_aluno'] ?></td>
                            <td><?php echo $resBuscarAluno['telefone_aluno'] ?></td>
                            <td><span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesAluno<?php echo $resBuscarAluno['matricula_aluno'] ?>"></span></td>
                        </tr>
                        <!--Modal para consultar os dados do aluno -->
                        <?php
                        include 'parts/extra/ModalDetalhesAluno.php';
                    }
                    ?>
                </table>
                <?php
            }
        } else {
            $buscarAluno = $_POST['nome_do_aluno'];
            $QueryBuscarAluno = "SELECT * FROM alunos WHERE matricula_aluno != 1";
            $ExeQrBuscarAluno = mysql_query($QueryBuscarAluno);
            if (mysql_num_rows($ExeQrBuscarAluno) > 0) {
                ?>
                <table class="table table-striped table-responsive col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <tr>
                        <td>Matrícula</td>
                        <td>Nome</td>
                        <td>Telefone</td>
                        <td>Editar/Visualizar</td>
                    </tr>
                    <?php
                    while ($resBuscarAluno = mysql_fetch_assoc($ExeQrBuscarAluno)) {
                        ?>
                        <tr>
                            <td><?php echo $resBuscarAluno['matricula_aluno'] ?></td>
                            <td><?php echo $resBuscarAluno['nome_aluno'] ?></td>
                            <td><?php echo $resBuscarAluno['telefone_aluno'] ?></td>
                            <td><span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesAluno<?php echo $resBuscarAluno['matricula_aluno'] ?>"></span></td>
                        </tr>
                        <!--Modal para consultar os dados do aluno -->
                        <?php
                        include 'parts/extra/ModalDetalhesAluno.php';
                    }
                    ?>
                </table>
                <?php
            }
        }
    } else {
        $QueryBuscarAluno = "SELECT * FROM alunos WHERE matricula_aluno != 1";
        $ExeQrBuscarAluno = mysql_query($QueryBuscarAluno);
        if (mysql_num_rows($ExeQrBuscarAluno) > 0) {
            ?>
            <table class="table table-striped table-responsive col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <tr>
                    <td>Matrícula</td>
                    <td>Nome</td>
                    <td>Telefone</td>
                    <td>Editar/Visualizar</td>
                </tr>
                <?php
                while ($resBuscarAluno = mysql_fetch_assoc($ExeQrBuscarAluno)) {
                    ?>
                    <tr>
                        <td><?php echo $resBuscarAluno['matricula_aluno'] ?></td>
                        <td><?php echo $resBuscarAluno['nome_aluno'] ?></td>
                        <td><?php echo $resBuscarAluno['telefone_aluno'] ?></td>
                        <td>
                            <span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesAluno<?php echo $resBuscarAluno['matricula_aluno'] ?>"></span>
                        </td>
                    </tr>
                    <!--Modal para consultar os dados do aluno -->
                    <?php
                    include 'parts/extra/ModalDetalhesAluno.php';
                }
                ?>
            </table>
            <?php
        }
    }
    ?>
</section>