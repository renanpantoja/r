<?php
/**
 * Created by PhpStorm.
 * User: renan
 * Date: 22/10/15
 * Time: 01:34
 */

header('Content-Type: text/html; charset=utf8');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

//cron não le outros arquivos então tive que inserir as classes aqui
class Config {

    public $config = array(
        'host'=>'localhost',
        'dbname'=>'r',
        'user'=>'root',
        'pass'=>''
    );

    public function conn(){

        if($_SERVER['SERVER_NAME'] != 'localhost'){
            $this->config = array(
                'host'=>'mysql.squad.net.br',
                'dbname'=>'squad05',
                'user'=>'squad05',
                'pass'=>'24351350'
            );
        }

        return new PDO(
            'mysql:host='.$this->config['host'].';dbname='.$this->config['dbname'],
            $this->config['user'],
            $this->config['pass'],
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'
            )
        );
    }
}

class Cron {
    public $conn;

    public function __construct(Config $config){
        $this->conn = $config->conn();
    }

    public function notifica($assunto_mail, $name, $assunto, $descricao){

        $email_nyx = "suporte@squad.net.br";
        $destino = "renan@squad.net.br";

        if (PATH_SEPARATOR == ":") {
            $quebra = "\r\n";
        } else {
            $quebra = "\n";
        }

        //composição do corpo do e-mail para o destinatário
        $corpo = "MIME-Version: 1.1".$quebra;
        $corpo .= "Content-type: text/plain; charset=utf-8".$quebra;
        $corpo .= "From: ".$email_nyx.$quebra; //E-mail do remetente
        $corpo .= "Return-Path: ".$email_nyx.$quebra; //E-mail do remetente
        $corpo  = "De:" . $quebra;
        $corpo .= "Nome: " . $name . $quebra;
        $corpo .= "Assunto: " . $assunto . $quebra;
        $corpo .= "Mensagem:" . $quebra;
        $corpo .= $descricao;

        $headers = 'From: '. $email_nyx . "\r\n" .
            //'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($destino, $assunto_mail, $corpo, $headers);
        //echo $destino.'<br>'.$assunto_mail.'<br>'.$corpo.'<br>'.$headers;
    }
    public function busca(){
        $select = $this->conn->prepare('SELECT * FROM task;');
        $select->execute();
        return $select->fetchAll();

        $select->execute();
        return $select->fetch();
    }
}

//aqui termina as classes

$task = new Cron(new Config());
$tasks = $task->busca();

foreach($tasks as $reg):

    if($reg['time'] == date("H:i")){
        $email = $task->notifica( 'R - '.$reg['title'], 'R - Seu assistente pessoal', $reg['title'], $reg['body']);
    } else {
        //echo 'Não há lembretes para esse horário<br>';
    }

endforeach;