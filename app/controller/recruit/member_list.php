<?php
/*
 *ファイルパスApplications/MAMP/htdocs/project/php/member_list.php
 *ファイル名　member_list.php
 *アクセスURL　http://localhost:8888/htdocs/project/member_list.php
 */
namespace php;
require_once ('../../../bootstrap/data.php');

// 管理者でログインしていなければ、リストへリダイレクト
if($_SESSION['user_id'] !== "admin") header('Location: ' . Bootstrap::ENTRY_URL . 'list.php');

$table ='member';
$dataArr = $db->select($table);


$context = [];
$context['dataArr'] = $dataArr;
$template = $twig->loadTemplate('/tasks/member_list.html.twig');
$template->display($context);
 ?>
