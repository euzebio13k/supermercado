<?php
use App\Produto;
use App\Fornecedor;
    require('../../vendor/autoload.php');
    include('../includes/cabecalho.php');
    include('../includes/menu.php');
    include('../includes/rodape.php');
    $fornecedores = Fornecedor::listar();
    $produto = Produto::buscarPorId($_GET['id']);
    /*echo "<pre>";
    print_r($produto);
    echo "</pre>";*/
?>
<main class="container mb-5 mt-3">
    <h1 class="text-center">Editar Produto</h1>
    <form method="POST" action="/supermercado/action/action_produto.php?action=alterar&id=<?= $produto->id ?>">
        Nome: <input name="nome" type="text" class="form-control" value="<?= $produto->nome ?>">
        Descrição <input name="descricao" type="text" class="form-control" value="<?= $produto->descricao ?>">
        Codigo: <input name="codigo" type="text" class="form-control" value="<?= $produto->codigo ?>">
        Quantidade: <input name="quantidade" type="number" class="form-control" value="<?= $produto->quantidade ?>">
        Preço: <input name="preco" type="text" class="form-control" value="<?= $produto->preco ?>">
        Data de validade: <input name="data_validade" type="date" class="form-control" value="<?= $produto->data_validade ?>">
        Fornecedor: <select name="fornecedor" class="form-select">
            <option value="<?= $produto->fornecedor->id ?>"><?= $produto->fornecedor->nome ?></option>
            <?php foreach($fornecedores as $f){?>
                <option value="<?= $f->id ?>"><?= $f->nome ?></option>
           <?php }?>
            </select>
        <input type="submit" value="Cadastrar" class="btn btn-primary mb-5">
    </form>
</main>

