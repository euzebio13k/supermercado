<?php
namespace App;
class Login{
    private static function init(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
    }
    public static function isLogged(){
        self::init();
        if(isset($_SESSION['usuario'])){
            return true;
        }else{
            return false;
        }
    }
    public static function login($funcionario){
        self::init();
        $_SESSION['usuario'] = [
            'id' => $funcionario->id,
            'nome' => $funcionario->nome,
            'cpf' => $funcionario->cpf
        ];
        header('location: /supermercado/view/produto/listar.php');
        exit;
    }
    public static function getUserLogged(){
        self::init();
        return self::isLogged() ? $_SESSION['usuario'] : null;
    }
    public static function logout(){
        self::init();
        unset($_SESSION['usuario']);
        header('location: /supermercado/index.php');
        exit;
    }
    public static function requireLogin(){
        if(!self::isLogged()){
            header('location: /supermercado/index.php');
            exit;
        }
    }
    public static function requireLogout(){
        if(self::isLogged()){
            header('location: /supermercado/view/produto/listar.php');
            exit;
        }
    } 
}