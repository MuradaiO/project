<?php
/*
 *ファイルパス　/Applications/MAMP/htdocs/project/php/home.php
 * ファイル名　home.php
 * アクセスURL　http://localhost/project/php/home.php
 */
namespace php;
 require_once ('../../bootstrap/data.php');
//require_once  (Bootstrap::APP_DIR . 'bootstrap/data.php');

$template = $twig->loadTemplate('home.html.twig');
$template->display([]);

 ?>
