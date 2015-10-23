<?php
/**
 * Created by PhpStorm.
 * User: renan
 * Date: 07/09/15
 * Time: 19:17
 */

    if(!isset($include) or !is_string($include)){
        header("HTTP/1.0 500 Internal Server Error");
        echo '<h1>Variável $include não encontrada!</h1>';
        exit;
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>R - Assistente pessoal</title>
    <!-- vireport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta charset="utf-8" >
    <!-- add bootstrap.css -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- add css renan -->
    <link href="../css/estilo.css" rel="stylesheet" media="screen">
</head>
<body>


    <?php include ROOT.DS.'view/admin/menu.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php
                include ROOT.DS.'view'.DS.'admin'.DS.$include;
                ?>
            </div>
        </div>
    </div>

    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>