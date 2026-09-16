<?php

use App\Fornecedor;
    require('../vendor/autoload.php');
    
    $opcao = $_GET['action'];
    $fornedor = new Fornecedor();
    switch($opcao){
        case 'cadastrar' :
            $fornedor->nome = $_POST['nome'];
            $fornedor->cnpj = $_POST['cnpj'];
            $fornedor->telefone = $_POST['telefone'];
            $fornedor->email = $_POST['email'];
            $fornedor->endereco = $_POST['endereco'];
            $fornedor->cadastrar();
            header('location: /supermercado/view/fornecedor/listar.php');
        break;
        case 'alterar' :
            
        break;
        case 'excluir' :
            
        break;
        
    }
?>