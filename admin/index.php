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

$include = (empty($_GET['pages'])) ? 'listar' : $_GET['pages'] ;

switch($include){
    case 'insert':
        $include = 'insert.php';
    break;
    case 'atualiza':
        $include = 'atualiza.php';
    break;
    case 'delete':
        $include = 'delete.php';
    break;
    case 'listar':
        $include = 'listar.php';
    break;
    default:
        $include = '404.php';
    break;
}

include ROOT.DS.'config/Config.php';
include ROOT.DS.'src/Pages.php';
include ROOT.DS.'src/Users.php';

$pages = new Pages(new Config());
$users = new Users(new Config());
$users->protege();

include ROOT.DS.'src'.DS.'Pages'.DS.$include;
include ROOT.DS.'view'.DS.'admin.php';