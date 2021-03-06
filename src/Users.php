<?php
/**
 * Created by PhpStorm.
 * User: renan
 * Date: 07/09/15
 * Time: 19:17
 */

class Users{

    public $mysql;

    public function __construct(Config $config){

        $this->mysql = $config->conn();

    }

    public function login($dados=null){

        session_start();

        if(empty($dados)){
            if(!empty($_COOKIE['r_uryh']) and !empty($_COOKIE['r_oijd'])) {
                $dados['usuario'] = base64_decode($_COOKIE['r_uryh']);
                $dados['senha'] = base64_decode($_COOKIE['r_oijd']);
            }
        } else {

            $this->lembrar($dados);

        }

        if(isset($dados['usuario']) and isset($dados['senha'])) {

            $usuario = $this->retUsuario($dados['usuario']);
            if (password_verify($dados['senha'], $usuario['senha'])) {
                $_SESSION['usuario'] = $usuario;
                header('Location: index.php');
            }
        }

    }

    public function logout(){

        session_start();
        session_unset();
        session_destroy();
        setcookie('cursophp_uryh');
        setcookie('cursophp_oijd');
        header('Location: login.php');

    }

    public function protege(){

        session_start();
        if(empty($_SESSION['usuario'])){
            header('Location: login.php');
        }

    }

    public function cadastrar($dados){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $cadastra = $this->mysql->prepare('INSERT into usuarios (nome, email, usuario, senha) VALUES (:nome, :email, :usuario, :senha);');
            $cadastra->bindValue(':nome', $dados['nome'], PDO::PARAM_STR);
            $cadastra->bindValue(':email', $dados['email'], PDO::PARAM_STR);
            $cadastra->bindValue(':usuario', $dados['usuario'], PDO::PARAM_STR);
            $cadastra->bindValue(':senha', $this->hash($dados['senha']), PDO::PARAM_STR);
            $cadastra->execute();
            header('Location: login.php');
        }

    }

    public function lembrar($dados){

        $cookie = array(
            'usuario'=>base64_encode($dados['usuario']),
            'senha'=>base64_encode($dados['senha'])
        );

        setcookie('cursophp_uryh', $cookie['usuario'], (time() + (15*24*3600)), $_SERVER['SERVER_NAME']);
        setcookie('cursophp_oijd', $cookie['senha'], (time() + (15*24*3600)), $_SERVER['SERVER_NAME']);

    }

    public function hash($senha){

        return password_hash($senha, PASSWORD_BCRYPT, array('cost'=>12));

    }

    public function retUsuario($user){

        $usuario = $this->mysql->prepare('SELECT * FROM usuarios WHERE usuario = :usuario');
        $usuario->bindValue(':usuario', $user, PDO::PARAM_STR);
        $usuario->execute();
        return $usuario->fetch();

    }


}