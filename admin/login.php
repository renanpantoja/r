<?php
/**
 * Created by PhpStorm.
 * User: renan
 * Date: 07/09/15
 * Time: 19:17
 */

header('Content-Type: text/html; charset=utf8');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));

include ROOT.DS.'config/Config.php';
include ROOT.DS.'src/Users.php';

$users = new Users(new Config());

$users->login($_POST);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>R - Administração</title>
    <!-- vireport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta charset="utf-8" >
    <!-- add bootstrap.css -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- add css renan -->
    <link href="../css/estilo.css" rel="stylesheet" media="screen">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-xs-12">
            <form action="login.php" method="POST">

                <h1>Acesso ao R</h1>

                <div class="input-group">
                    <span class="input-group-addon">Login:</span>
                    <input class="form-control" type="text" name="usuario">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Senha:</span>
                    <input class="form-control" type="password" name="senha">
                </div>

                <hr/>

                <div class="input-group">
                    <input class="btn btn-primary" type="submit" name="" value="Logar">
                    <a class="btn btn-danger" href="../">Voltar</a>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>