<?php
/*
 *ファイルパス /Application/MAMP/htdocs/project/php/regist.php
 *ファイル名　regist.php
 *アクセスURL http://localhost/project/php/regist.php
 */
namespace php;


require_once ('../../bootstrap/data.php');
use php\master\initMaster;

// 初期データを設定
$dataArr = initMaster::getRegistArr();

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
