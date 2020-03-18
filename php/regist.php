<?php
/*
 *ファイルパス /Application/MAMP/htdocs/project/php/regist.php
 *ファイル名　regist.php
 *アクセスURL http://localhost/project/php/regist.php
 */
namespace php;


require_once ('data.php');
use php\master\initMaster;

// 初期データを設定
$dataArr = [
  'family_name' => '',
  'first_name' => '',
  'family_name_kana' => '',
  'first_name_kana' => '',
  'sex' => '',
  'year' =>'',
  'month' => '',
  'day' => '',
  'zip1' =>'',
  'zip2' =>'',
  'address' => '',
  'email' => '',
  'tel1' => '',
  'tel2' => '',
  'tel3' => '',
  'traffic' => '',
  'contents' => '',
  'password' => ''
];

// エラーメッセージの定義、初期
$errArr = [];
foreach ($dataArr as $key => $value) {
  $errArr[$key] = '';
}

$context['dataArr'] = $dataArr;
$context['errArr'] = $errArr;

$template = $twig->loadTemplate('regist.html.twig');
$template->display($context);
?>
