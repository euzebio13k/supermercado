<?php
    require('../../vendor/autoload.php');
    include('../includes/cabecalho.php');
    include('../includes/rodape.php');
?>
<main class="container mb-5 mt-3">
    <h1 class="text-center">Página de login</h1>
    <form method="POST" action="">
        CPF: <input name="cpf" type="text" class="form-control">
        Senha <input name="senha" type="password" class="form-control">
        <input type="submit" value="Cadastrar" class="btn btn-primary mb-5">
    </form>
</main>