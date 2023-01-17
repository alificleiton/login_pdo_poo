<?php

class Conexao{
    //atributo privado
    private $usuario;
    private $senha;
    private $banco;
    private $servidor;
    private static $pdo;

    //construtor
    public function __construct(){
        $this->servidor = "localhost";
        $this->banco = "alunos";
        $this->usuario = "root";
        $this->senha = "";
    }

    //metodo para conectar
    public function conectar(){
        try{
            if(is_null(self::$pdo)){
                self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
            }
            return self::$pdo;
        }catch(PDOException $e){
            echo 'Error: '.$e->getMessage();
        }
    }

}

?>