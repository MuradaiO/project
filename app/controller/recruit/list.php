<?php
/*
 *ファイルパス Applications/MAMP/htdocs/project/php/list.php
 *ファイル名 list.php
 *アクセスURL　http://localhost/project/php/list.php
 */
namespace php;

require_once ('../../../bootstrap/data.php');

// SESSIONに情報がなかったらlogin画面へ
if(isset($_SESSION['email']) === false) header('Location: ' . Bootstrap::ENTRY_URL . 'login.php');


// SessionKeyを見て、DBへの登録状態をチェックする

$ses->checkSession();

$ctg_id = (isset($_GET['ctg_id']) === true && preg_match('/^[0-9]+$/', $_GET['ctg_id']) === 1)
          ? $_GET['ctg_id'] : '';


// カテゴリーリスト（一覧）を取得する
$cateArr = $itm->getCategoryList();
// 商品リストを取得する
$taskArr = $itm->getItemList($ctg_id);

$context['cateArr'] = $cateArr;
$context['taskArr'] = $taskArr;

$template = $twig->loadTemplate('/tasks/list.html.twig');
$template->display($context);
?>
