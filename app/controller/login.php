<?php
/*
 *ファイルパス Applications/MAMP/htdocs/project/php/login.php
 *ファイル名 login.php
 *アクセスURL　http://localhost/project/php/login.php
 */
namespace php;

require_once ('../../bootstrap/data.php');
 if(isset($_SESSION['user_id']) === true) header('Location: ' . Bootstrap::ENTRY_URL . 'recruit/home.php');
 //var_dump($_SESSION);
$dataArr['email'] = $_SESSION['email'];
$dataArr['password'] = $_SESSION['password'];

$context['dataArr'] = $dataArr;
$context['errArr'] = $errArr;

$template = $twig->loadTemplate('login.html.twig');
$template->display($context);

?>
