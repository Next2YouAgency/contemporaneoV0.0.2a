<div class="col-md-6">
    <a href="?acesso=Exibir_Caixa&Caixa=Contemporaneo" class="col-md-6 col-md-push-3">
        <div  class="col-md-6 col-md-push-3">
            <img src="img/money.png" class="img-responsive img-rounded">
        </div>
        <p class="lead col-md-12 text-center">Caixa Contemporâneo</p>
    </a>
</div>
<div class="col-md-6">
    <a href="?acesso=Exibir_Caixa&Caixa=Yoshio" class="col-md-6 col-md-push-3">
        <div  class="col-md-6 col-md-push-3">
            <img src="img/money.png" class="img-responsive img-rounded">
        </div>
        <p class="lead col-md-12 text-center">Caixa Yoshio</p>
    </a>
</div>
<div class="clearfix"></div>
<hr>
<?php
if($_GET['Caixa'] == "Contemporaneo"){
    include_once 'pages/Caixas/Caixa_Contemporaneo.php';
}else if($_GET['Caixa'] == "Yoshio"){
    include_once 'pages/Caixas/Caixa_Yoshio.php';
}