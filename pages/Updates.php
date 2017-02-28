<?php

$LevelAcesso = $_SESSION['Login']['level_acesso'];
if ($LevelAcesso == 0) {
    include_once 'parts/pages/AcessoAdm.php';
} else if ($LevelAcesso == 1) {
    echo "Gerenciador do Sistema";
    include_once 'parts/pages/AcessoGer.php';
} else {
    echo "Funcionário do Sistema";
    include_once 'parts/pages/Funcionarios.php';
}