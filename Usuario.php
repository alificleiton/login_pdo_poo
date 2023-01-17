<?php

include_once "Conexao.php";

class Usuario{

    //atributos
    private $con;
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $nivel;

    //construtor
    public function __construct(){
        $this->con = new Conexao();
    }

    //metodos
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function logaUsuario($dados){
        $this->email = $dados['email'];
        $this->senha = $dados['senha'];
        try{
            $cst = $this->con->conectar()->prepare("SELECT `id`, `email`, `senha` FROM `login` WHERE `email` = :email AND `senha` = :senha;");
            $cst->bindParam(':email', $this->email, PDO::PARAM_STR);
            $cst->bindParam(':senha', $this->senha, PDO::PARAM_STR);
            $cst->execute();
            if($cst->rowCount() == 0){
                $_SESSION['autenticado'] = 'NAO';
                header('Location: login.php?login=erro');
            }else{
                session_start();
                $rst = $cst->fetch();
                $_SESSION['autenticado'] = 'SIM';
                $_SESSION['id'] = $rst['id'];
                header('Location: admin.php');
            }
        }catch(PDOException $e){
            return 'Error: '.$e->getMessage();
        }
    }

    public function funcionarioLogado($dado){
        $cst = $this->con->conectar()->prepare("SELECT `id`, `nome` FROM `login` WHERE `id` = :id;");
        $cst->bindParam(':id', $dado, PDO::PARAM_INT);
        $cst->execute();
        $rst = $cst->fetch();
        $_SESSION['nome'] = $rst['nome'];
    }

    public function sairFuncionario(){
        session_destroy();
        header('location: login.php');
    }


}

?>