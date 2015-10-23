<?php
/**
 * Created by PhpStorm.
 * User: renan
 * Date: 07/09/15
 * Time: 19:17
 */

header('Content-Type: text/html; charset=utf8');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

include ROOT.DS.'config/Config.php';
include ROOT.DS.'src/Pages.php';

$pages = new Pages(new Config());

$slug = (empty($_GET['page'])) ? 'home' : $_GET['page'] ;

$pagina = $pages->read($slug);
$paginas = $pages->read();

if(empty($pagina)){
    header('HTTP/1.0 404 Not Found');
    $pagina['title'] = 'Página não encontrada';
    $pagina['body'] = '<h1>Página não encontrada</h1>';

}

include ROOT.DS.'view'.DS.'front.php';