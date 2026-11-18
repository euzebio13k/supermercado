<?php
namespace App;
use PDO;
use DateTime;
class Venda{
    public $id;
    public $funcinario;
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
    public function alterar(){
        return (new DataBase('venda'))->update($this->id, [
            
        ]);
    }
    public function excluir(){
        return (new DataBase('venda'))->delete('id='.$this->id);
    }
    public static function listar($where = null, $order = null, $limit = null){
        $array = [];
        $vendas = (new DataBase('venda'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);        
        foreach($vendas as $p){
            $p->fornecedor = Fornecedor::buscarPorId($p->id_fornecedor);
            $array[] = $p;   
        }
        return $array; 
    }
    public static function buscarPorId($id){
        $venda = (new DataBase('venda'))->select('id='.$id)->fetchObject(self::class);
        $venda->fornecedor = Fornecedor::buscarPorId($venda->id_fornecedor);
        return $venda;
    }
}