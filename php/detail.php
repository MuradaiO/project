<?php
/*
 *ファイルパス　/Applicarions/MAMP/project/php/detail.php
 *ファイル名　detail.php （商品詳細を表示するプログラム、Controller)
 *アクセスURL http://localhost/project/php/detail.php
 */
namespace php;
use php\lib\Session;

require_once ('data.php');
// セッションに、セッションIDを設定する
$ses->checkSession();

// item_idを取得する
$item_id = (isset($_GET['item_id']) === true && preg_match('/^\d+$/' , $_GET['item_id']) === 1)
            ? $_GET['item_id'] : '';

// item_idが取得できてない場合、商品一覧へ遷移させる
if ($item_id === ''){
  header('Location: ' . Bootstrap::ENTRY_URL. 'list.php');
}

// カテゴリーリスト（一覧）を取得する
$cateArr = $itm->getCategoryList();
// 商品情報を取得する
$itemData = $itm->getItemDetailData($item_id);


$context['cateArr'] = $cateArr;
$context['itemData'] = $itemData[0]; // なぜ０が必要かは、$itemDataをvar_dumpしてみよう。
$template = $twig->loadTemplate('detail.html.twig');
$template->display($context);

 ?>
