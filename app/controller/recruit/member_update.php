<?php
/*
* ファイルパス：Applications/MAMP/htdocs/project/php/member_update.php
* ファイル名：member_update.php
* アクセスURL：http://localhost/project/php/member_update.php
 */
namespace php;

require_once ('../../../bootstrap/data.php');



if (isset($_GET['update'])){
  $dataArr = $mem->memberSelect($_GET['update']);

  $dataArr[0]['traffic'] = explode('_', $dataArr[0]['traffic']);
}else {
  header('Location :' . Bootstrap::ENTRY_URL.'member_list.php');
  exit();
}


$context['dataArr'] = $dataArr[0];
$template = $twig->loadTemplate('/tasks/member_update.html.twig');
$template->display($context);
 ?>
