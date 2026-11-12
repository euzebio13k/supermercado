<?php
    require('../../vendor/autoload.php');
    include('../includes/cabecalho.php');
    include('../includes/menu.php');
    include('../includes/rodape.php');
?>
<main class="container mb-5 mt-3">
    <h1 class="text-center">Cadastrar Funcionario</h1>
    <form method="POST" action="/supermercado/action/action_funcionario.php?action=cadastrar">
        Nome: * <input name="nome" type="text" class="form-control" required>
        CPF: * <input name="cpf" type="text" class="form-control" required maxlength="11">
        Telefone: * <input name="telefone" type="text" class="form-control" required>
        Email: * <input name="email" type="text" class="form-control" required>
        Endereço: * <input name="endereco" type="text" class="form-control" required>
        Data de Nascimento: * <input name="dtn" type="date" class="form-control" required>
        Cargo: * <input name="cargo" type="text" class="form-control" required>
        Salario: * <input name="salario" type="text" class="form-control" required>
        Senha: * <input name="senha" type="password" class="form-control" required minlegth="6">
        <input type="submit" value="Cadastrar" class="btn btn-primary mb-5">
    </form>
</main>
