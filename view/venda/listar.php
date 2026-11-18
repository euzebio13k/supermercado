<?php
use App\Produto;
use App\Venda;
    require('../../vendor/autoload.php');
    include('../includes/cabecalho.php');
    include('../includes/menu.php');
    include('../includes/rodape.php');
    use App\Login;
    Login::requireLogin();
    
    $venda = Venda::buscarPorId(2);
    $vendas = Venda::listar();
    echo "<pre>";
    print_r($vendas);
    print_r($venda);
    echo "</pre>";
    exit;
?>