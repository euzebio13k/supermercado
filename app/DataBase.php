<?php
namespace App;
use App\Fornecedor;
use PDO;
use PDOException;
class DataBase{
    private const HOST = 'localhost';
    private const USER = 'root';
    private const PASSWORD = '123';
    private const DBNAME = 'supermercado';
    private $connection;
    private $table;
    //metodo que constroi a classe
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }
    //metodo que cria uma conexão com o banco de dados
    public function setConnection(){
        $connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME,self::USER,self::PASSWORD);
    }
    //metodo que insere dados no banco
    public function execute($query, $values){
        try{
            echo "<pre>";
            print_r($query);
            echo "</pre>";
        }catch(PDOException $e){
            die('ERRO: '.$e);
        }
    }
    public function insert($array){
        //extrair as chaves do array
        $fields = array_keys($array);
        //criar um array com valores = ?
        $binds = array_pad([], count($array),'?');
        //monta a query
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).')
        VALUES('.implode(',',$binds).')';
        //executa a query
        $this->execute($query, array_values($array));
        return $this->connection->lastInsertId();
    }
}
$db = new DataBase('fornecedor');
$db->insert([
    'nome'=>'Coca-cola',
    'cnpj'=>'6745765678687',
    'telefone'=>'756786',
    'email'=>'coca@gmail.com',
    'endereco'=>'Avenida JK'
]);