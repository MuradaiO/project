<?php

/*
 * ファイルパス：Applications/MAMP/htdocs/project/php/member_detail.php
 * ファイル名：member_detail.php
 * アクセスURL：http://localhost//member_detail.php
 */
namespace php;

require_once ('../../../bootstrap/data.php');

use php\master\initMaster;


if (isset($_GET['mem_id'])){
  $mem_id = $_GET['mem_id'];
  $data = $mem->memberSelect($mem_id);
  //var_dump($dataArr);
  $dataArr  = (isset($data))? $data[0] : '';
  $dataArr['traffic'] = explode('_', $dataArr['traffic']);

}else{
  header('Location :' . Bootstrap::ENTRY_URL.'member_list.php');
  exit();
}

$context['dataArr'] = $dataArr;

$template = $twig->loadTemplate('/tasks/member_detail.html.twig');
$template->display($context);
 ?>
