<?php
/*
 *ファイルパス /Application/MAMP/htdocs/project/php/f-repo.php
 *ファイル名　f-repo.php
 *アクセスURL http://localhost/project/php/f-repo.php
 */
namespace php;

require_once ('data.php');

use php\master\initMaster;

// 初期データを設定
$dataArr = [
  'family_name' => '',
  'first_name' => '',
  'year' =>'',
  'month' => '',
  'day' => '',
  'address' => '',
  'email' => '',
  'spend' => '',
  'start' => '',
  'end' => '',
  'traffic' => '',
  'contents' => ''
];

// エラーメッセージの定義、初期
$errArr = [];
foreach ($dataArr as $key => $value) {
  $errArr[$key] = '';
}

$dataArr['family_name'] = (isset($_SESSION['family_name'])) ? $_SESSION['family_name'] : '';
$dataArr['first_name'] = (isset($_SESSION['first_name'])) ? $_SESSION['first_name'] : '';
$dataArr['email'] = (isset($_SESSION['email'])) ? $_SESSION['email'] : '';



$context['dataArr'] = $dataArr;
$context['errArr'] = $errArr;

$template = $twig->loadTemplate('f-repo.html.twig');
$template->display($context);
?>
