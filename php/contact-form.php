<?php
/*
 *ファイルパス　/Applications/MAMP/htdocs/project/php/contact-form.php
 * ファイル名　contact-form.php
 * アクセスURL　http://localhost/project/php/contact-form.php
 */
namespace php;
require_once ('data.php');

$template = $twig->loadTemplate('contact-form.html.twig');
$template->display([]);

 ?>
