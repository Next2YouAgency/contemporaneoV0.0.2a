<?php
if (isset($_POST['CadastrarUpdate'])) {
    $titulo_update = $_POST['TituloUpdate'];
    $usuario_update = $_SESSION['Login']['usuario'];
    $dia_update = date('d-m-Y', strtotime($_POST['DataUpdate']));
    $tipo_update = $_POST['TipoDeUpdate'];
    $descricaoUpdate = $_POST['Descricao'];

    $QueryInserirUpdate = "INSERT INTO updates_sistema (usuario, dia_update, titulo_update, tipo_update, descricao) VALUES ('$usuario_update', '$dia_update', '$titulo_update', '$tipo_update', '$descricaoUpdate');";

    $ExeQrInserirUpdate = mysql_query($QueryInserirUpdate);
    if ($ExeQrInserirUpdate) {
        ?>
        <script>alert("Update inserido no banco de dados")</script>
        <meta http-equiv="refresh" content="0;?acesso=Updates">
        <?php
    } else {
        ?>
        <script>alert("Erro ao inserir: <?php echo mysql_error() ?>")</script>
        <?php
    }
}
?>
<div class="col-md-5">
    <form action="?acesso=Updates&InserirUpdate" method="post">
        <div class="form-group col-md-6" style="padding-left:0;">
            <label for="TituloUpdate">Título: </label>
            <input type="text" name="TituloUpdate" id="TituloUpdate" class="form-control" required="Coloque o título antes de cadastrar">
        </div>
        <div class="form-group col-md-6" style="padding-right: 0">
            <label for="DataUpdate">Data: </label>
            <input type="date" name="DataUpdate" id="DataUpdate" class="form-control" required="Escolha a data antes de cadastrar">
        </div>
        <div class="form-group">
            <label for="TipoDeUpdate">Local: </label>
            <select name="TipoDeUpdate" id="TipoDeUpdate" class="form-control" required="Escolha a opção antes de cadastrar">
                <option selected disabled>Escolha a opção</option>
                <option value="Agenda">Agenda</option>
                <option value="Alunos">Alunos</option>
                <option value="Professores">Professores</option>
                <option value="Financeiro">Financeiro</option>
                <option value="Configuracoes">Configurações</option>
                <option value="Updates">Atualizações</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Descricao">Descrição: </label>
            <textarea name="Descricao" id="Descricao" class="form-control" placeholder="Descreva a atualização aplicada no sistema" required></textarea>
        </div>
        <button type="submit" name="CadastrarUpdate" class="col-md-5 btn btn-success"><i class="glyphicon glyphicon-floppy-saved"></i></button>
        <button type="reset" class="col-md-5 col-md-push-2 btn btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i></button>
    </form>
</div>
        <div class="col-md-7" style="max-height: 450px; overflow-y: scroll">
    <h3>Últimos Updates</h3>
    <?php
    $SQLBuscarUpdates = mysql_query("SELECT * FROM updates_sistema ORDER BY id DESC");
    if ($SQLBuscarUpdates) {
        while ($ExibirUpdates = mysql_fetch_assoc($SQLBuscarUpdates)) {
            ?>
            <div class="col-md-12 bg-red-gradient">
                <u><p><?php echo $ExibirUpdates['dia_update'] . " - " . $ExibirUpdates['titulo_update'] ?></p></u>
                <span><b>Descrição: </b><?php echo $ExibirUpdates['descricao'] ?></span><br>
                <span><b>Usuário: </b><?php echo $ExibirUpdates['usuario'] ?></span>
            </div>
            <?php
        }
    }
    ?>
</div>