<?php
/*
 *ファイルパス　/Applications/MAMP/htdocs/project/php/home.php
 * ファイル名　home.php
 * アクセスURL　http://localhost/project/php/home.php
 */
namespace php;
 require_once ('../../../bootstrap/data.php');
//require_once  (Bootstrap::APP_DIR . 'bootstrap/data.php');

$ctg_id = (isset($_GET['ctg_id']) === true && preg_match('/^[0-9]+$/', $_GET['ctg_id']) === 1)
          ? $_GET['ctg_id'] : '';


// カテゴリーリスト（一覧）を取得する
$cateArr = $itm->getCategoryList();
// 商品リストを取得する
$taskArr = $itm->getItemList($ctg_id);

$context['cateArr'] = $cateArr;
$context['taskArr'] = $taskArr;

$template = $twig->loadTemplate('/tasks/recruit.html.twig');
$template->display($context);

 ?>
