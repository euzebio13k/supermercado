<?php
namespace App;
use PDO;
class Funcionario{
    public $id;
    public $nome;
    public $cpf;
    public $email;
    public $telefone;
    public $endereco;
    public $dtn;
    public $cargo;
    public $salario;
    public $senha;


    public function cadastrar(){
        $db = new DataBase('funcionario');
        $db->insert([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco,
            'dtn' => $this->dtn,
            'cargo' => $this->cargo,
            'salario' => $this->salario,
            'senha' => $this->senha
        ]);
        return true;
    }
    public function alterar(){
        return (new DataBase('funcionario'))->update($this->id, [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco,
            'dtn' => $this->dtn,
            'cargo' => $this->cargo,
            'salario' => $this->salario,
            'senha' => $this->senha
        ]);
    }
    public function excluir(){
        return (new DataBase('funcionario'))->delete('id='.$this->id);
    }
    public static function listar($where = null, $order = null, $limit = null){
        return (new DataBase('funcionario'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function buscarPorId($id){
        return (new DataBase('funcionario'))->select('id='.$id)->fetchObject(self::class);
    }
    public static function logar($cpf, $senha){
        return (new DataBase('funcionario'))
        ->select("cpf='".$cpf."' and senha='".$senha."'")->fetchObject(self::class);
    }
    
}