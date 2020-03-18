<?php
/*
 *ファイルパス　/Applications/MAMP/htdocs/project/php/home.php
 * ファイル名　home.php
 * アクセスURL　http://localhost/project/php/home.php
 */
namespace php;
require_once ('data.php');

$template = $twig->loadTemplate('home.html.twig');
$template->display([]);

 ?>
