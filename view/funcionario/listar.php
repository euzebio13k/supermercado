<?php
use App\Funcionario;
    require('../../vendor/autoload.php');
    include('../includes/cabecalho.php');
    include('../includes/menu.php');
    include('../includes/rodape.php');
    $funcionarios = Funcionario::listar(null,'nome asc');
    $msg = $_GET['msg'];
?>
<main class="container">
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= $msg ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <h2 class="text-center">Lista de Funcionarios</h2>
    <div class="text-end my-2">
        <a href="cadastrar.php"><button class="btn btn-success">+ Novo Funcionario</button></a>
    </div>
    <table class="table table-hover">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Data de Nascimento</th>
                <th>Cargo</th>
                <th>Salario</th>
                <th>Ações</th>
            </tr>
            </thead>
            <?php foreach($funcionarios as $funcionario){ ?>
                <tr>
                    <td><?= $funcionario->id ?></td>
                    <td><?= $funcionario->nome ?></td>
                    <td><?= $funcionario->cpf ?></td>
                    <td><?= $funcionario->telefone ?></td>
                    <td><?= $funcionario->email ?></td>
                    <td><?= $funcionario->endereco ?></td>
                    <td><?= date('d/m/Y',strtotime($funcionario->dtn)) ?></td>
                    <td><?= $funcionario->cargo ?></td>
                    <td><?= $funcionario->salario ?></td>
                    <td><a href="alterar.php?id=<?= $funcionario->id ?>"><button class="btn btn-primary">Editar</button></a>
                    <a href="/supermercado/action/action_funcionario.php?action=excluir&id=<?= $funcionario->id ?>">
                    <button onclick="return confirm('Deseja realmente excluir esse Funcionario?')" class="btn btn-danger">Excluir</button></a</td>
                </tr>
        <?php    }if (empty($funcionarios)): ?>
                <tr><td colspan="10" class="text-center py-4"><b>Nenhum Funcionario cadastrado.</b></td></tr>
        <?php endif; ?>       
    </table>
</main>