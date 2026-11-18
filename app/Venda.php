<?php
namespace App;
use PDO;
use DateTime;
class Venda{
    public $id;
    public $funcionario;
    public $cpf_cliente;
    public $produtos;
    public $valor_total;
    public $data_venda;
    public function cadastrar(){
        $db = new DataBase('venda');
        $this->data_venda = new DateTime();
        $this->id = $db->insert([
            'funcionario_id' => $this->funcinario->id,
            'cpf_cliente' => $this->cpf_cliente,
            'data_venda' => $this->data_venda->format('Y-m-d H:i:s')
        ]);
        $db2 = new DataBase('venda_produto');
        foreach($this->produtos as $produto){
            $db2->insert([
                'venda_id' => $this->id,
                'produto_id' => $produto->id
            ]);    
        }
        
        return true;
    }
    public function excluir(){
        return (new DataBase('venda'))->delete('id='.$this->id);
    }
    public static function listar($where = null, $order = null, $limit = null){
        $vendas = (new DataBase('venda'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);        
        foreach($vendas as $venda){
            $venda->funcionario = Funcionario::buscarPorId($venda->id_funcionario);
        }
        return $vendas; 
    }
    public static function buscarPorId($id) {
        //Busca a venda
        $venda = (new DataBase('venda'))->select('id = ' . $id)->fetchObject(self::class);
        if (!$venda) {
            return null;
        }
        //busca o funcionario que fez a venda pelo id
        $venda->funcionario = Funcionario::buscarPorId($venda->id_funcionario);
        //Busca os produtos dessa venda
        $venda->produtos = self::buscarProdutosPorVenda($venda->id);
        $venda->valor_total = 0;
        foreach ($venda->produtos as $produto) {
            // Multiplica o preço pela quantidade_vendida (mantendo $produto->quantidade intacto para o estoque)
            $venda->valor_total += ($produto->preco * $produto->quantidade_vendida);
        }
        return $venda;
    }
    
    public static function buscarProdutosPorVenda($id) {
        //busca os ids dos produtos por venda
        $pids = (new DataBase('venda_produto'))->select("id_venda = $id")->fetchAll(PDO::FETCH_CLASS);
        $produtos = [];
        foreach ($pids as $pid) {
            //busca o produto por id
            $produto = Produto::buscarPorId($pid->id_produto);
            if ($produto) {
                // Cria uma propriedade nova para não apagar o estoque ($produto->quantidade)
                $produto->quantidade_vendida = $pid->quantidade;
                //seta o produto buscado no array produtos
                $produtos[] = $produto;
            }
        }
        return $produtos;
    }
}