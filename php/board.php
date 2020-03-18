<?php
/*
* ファイルパス：/Applications/MAMP/project/php/board.php
* ファイル名：board.php
* アクセスURL：http://localhost/project/php/board.php
*/
namespace php;

require_once ('data.php');

$dataArr = [];
$table = 'board';
$dataArr['user_id'] = $userData['user_id'];
$dataArr['email'] = $userData['email'];
$dataArr['sex'] = $userData['sex'];

if(isset($_POST['send']) && isset($_POST['contents'])){
  $dataArr['contents'] = $_POST['contents'];

  $res = $db->insert($table,$dataArr);

  $dataArr['result'] = ($res !== false) ? '書き込みました' : '書き込みに失敗しました';
}

$data = $db->select($table);

$context['dataArr'] = $dataArr;
arsort($data);
$context['data'] = $data;


$template = $twig->loadTemplate('board.html.twig');
$template->display($context);

?>
