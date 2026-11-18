<?php
use App\Produto;
use App\Venda;
    require('../../vendor/autoload.php');
    include('../includes/cabecalho.php');
    include('../includes/menu.php');
    include('../includes/rodape.php');
    use App\Login;
    Login::requireLogin();
    
    $vendas = Venda::buscarPorId(2);
    $msg = $_GET['msg'];
    echo "<pre>";
    print_r($vendas);
    echo "</pre>";
    exit;
?>