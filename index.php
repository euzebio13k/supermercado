<?php
use App\Funcionario;
use App\Login;
    require('vendor/autoload.php');
    include('view/includes/cabecalho.php');
    include('view/includes/rodape.php');
    if(!empty($_POST['cpf']) && !empty($_POST['senha'])){
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        $funcionario = Funcionario::logar($cpf,$senha);
        if($funcionario != null){
            Login::login($funcionario);
        }else{
            echo '<div class="alert alert-danger alert-dismissible fade show"
             role="alert">';
            echo 'Login ou senha incorretos';
            echo'<button type="button" class="btn-close" data-bs-dismiss="alert"
             aria-label="Close"></button>';
            echo '</div>';
        }
    }   
?>
<main class="container mb-5 mt-3">
    <h1 class="text-center">Página de login</h1>
    <form method="POST" action="">
        CPF: <input name="cpf" type="text" class="form-control">
        Senha <input name="senha" type="text" class="form-control">
        <input type="submit" value="Entrar" class="btn btn-primary mb-5">
    </form>
</main>