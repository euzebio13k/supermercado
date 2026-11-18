<?php
use App\Funcionario;
    require('../../vendor/autoload.php');
    include('../includes/cabecalho.php');
    include('../includes/menu.php');
    include('../includes/rodape.php');
    use App\Login;
    Login::requireLogin();
    
    $funcionario = Funcionario::buscarPorId($_GET['id']);

?>
<main class="container mb-5 mt-3">
    <h1 class="text-center">Editar Funcionario</h1>
    <form method="POST" action="/supermercado/action/action_funcionario.php?action=alterar&id=<?= $funcionario->id ?>">
        Nome: * <input name="nome" type="text" class="form-control" value="<?= $funcionario->nome ?>" required>
        CPF: * <input name="cpf" type="text" class="form-control" value="<?= $funcionario->cpf ?>" required maxlength="11">
        Telefone: * <input name="telefone" type="text" class="form-control" value="<?= $funcionario->telefone ?>" required>
        Email: * <input name="email" type="text" class="form-control" value="<?= $funcionario->email ?>" required>
        Endereço: * <input name="endereco" type="text" class="form-control" value="<?= $funcionario->endereco ?>" required>
        Data de Nascimento: * <input name="dtn" type="date" class="form-control" value="<?= $funcionario->dtn ?>" required>
        Cargo: * <input name="cargo" type="text" class="form-control" value="<?= $funcionario->cargo ?>" required>
        Salario: * <input name="salario" type="text" class="form-control" value="<?= $funcionario->salario ?>" required>
        Senha: * <input name="senha" type="password" class="form-control" value="<?= $funcionario->senha ?>" required minlength="6">
        <input type="submit" value="Editar" class="btn btn-primary mb-5">
    </form>
</main>

