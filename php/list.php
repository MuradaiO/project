<?php
/*
 *ファイルパス Applications/MAMP/htdocs/project/php/list.php
 *ファイル名 list.php
 *アクセスURL　http://localhost/project/php/list.php
 */
namespace php;

require_once ('data.php');

error_reporting(-1);
ini_set('display_errors', 'On');
// SESSIONに情報がなかったらlogin画面へ
if(isset($_SESSION['email']) === false) header('Location: ' . Bootstrap::ENTRY_URL . 'login.php');


// SessionKeyを見て、DBへの登録状態をチェックする

$ses->checkSession();

$ctg_id = (isset($_GET['ctg_id']) === true && preg_match('/^[0-9]+$/', $_GET['ctg_id']) === 1)
          ? $_GET['ctg_id'] : '';

// カテゴリーリスト（一覧）を取得する
$cateArr = $itm->getCategoryList();
// 商品リストを取得する
$dataArr = $itm->getItemList($ctg_id);



$context['cateArr'] = $cateArr;
$context['dataArr'] = $dataArr;


$template = $twig->loadTemplate('list.html.twig');
$template->display($context);
?>
