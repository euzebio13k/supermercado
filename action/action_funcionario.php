<?php
use App\Funcionario;
    require('../vendor/autoload.php');
    $opcao = $_GET['action'];
    $funcionario = new Funcionario();
    $msg='';
    switch($opcao){
        case 'cadastrar' :
            $funcionario->nome = $_POST['nome'];
            $funcionario->cpf = $_POST['cpf'];
            $funcionario->telefone = $_POST['telefone'];
            $funcionario->email = $_POST['email'];
            $funcionario->endereco = $_POST['endereco'];
            $funcionario->dtn = $_POST['dtn'];
            $funcionario->cargo = $_POST['cargo'];
            $funcionario->salario = $_POST['salario'];
            $funcionario->senha = $_POST['senha'];
            $funcionario->cadastrar();
            $msg='Funcionario cadastrado com sucesso';
            header('location: /supermercado/view/funcionario/listar.php?msg='.$msg);
        break;
        case 'alterar' :
            $funcionario = Funcionario::buscarPorId($_GET['id']);
            $funcionario->nome = $_POST['nome'];
            $funcionario->cpf = $_POST['cpf'];
            $funcionario->telefone = $_POST['telefone'];
            $funcionario->email = $_POST['email'];
            $funcionario->endereco = $_POST['endereco'];
            $funcionario->dtn = $_POST['dtn'];
            $funcionario->cargo = $_POST['cargo'];
            $funcionario->salario = $_POST['salario'];
            $funcionario->senha = $_POST['senha'];$funcionario->alterar();
            $msg='Funcionario alterado com sucesso';
            header('location: /supermercado/view/funcionario/listar.php?msg='.$msg);
        break;
        case 'excluir' :
            $funcionario->id = $_GET['id'];
            $funcionario->excluir();
            $msg='Funcionario excluido com sucesso';
            header('location: /supermercado/view/funcionario/listar.php?msg='.$msg);
        break;
    }
?>