<?php
namespace App;
class Fornecedor{
    public $id;
    public $nome;
    public $cnpj;
    public $email;
    public $telefone;
    public $endereco;   

    public function cadastrar(){
        $db = new DataBase('fornecedor');
        $db->insert([
            'nome' => $this->nome,
            'cnpj' => $this->cnpj,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco
        ]);
        return true;
    }
    public function alterar(){
        
    }
    public function excluir(){
        
    }
    public static function listar(){
        
    }
    public static function buscarPorId($id){
        
    }
    public static function buscarPor($campo, $busca){
        
    }
}