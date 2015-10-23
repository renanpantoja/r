<?php
/**
 * Created by PhpStorm.
 * User: renan
 * Date: 22/10/15
 * Time: 01:46
 */

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
