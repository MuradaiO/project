<?php
/*
 *ファイルパス　/Applications/MAMP/htdocs/project/add_item.php
 * ファイル名　add_item.php
 * アクセスURL　http://localhost/project/add_item.php
 */
namespace php;

require_once  ('data.php');
use php\master\initMaster;
// 管理者でログインしていなければ、リストへリダイレクト
if($_SESSION['user_id'] !== "admin") header('Location: ' . Bootstrap::ENTRY_URL . 'list.php');


if (isset($_POST['send'])) {
  unset($_POST['send']);
  $dataArr = $_POST;

  if(!empty($_FILES)){
    // $_FILES [ 'image' => [連想配列になってる]]
    $image = $_FILES['image'];
    $res = $itm->imageCheck($image);
    var_dump($res);
    if(empty($res)){
      $dataArr['image'] = $image['name'] ;
    }else{
      $err_msg = $res;
      $dataArr = $itm->getItemImage($dataArr);
    }
  }

  $res = $itm->insertItemData($dataArr);

  $msg = ($res === true) ? '登録が完了しました' : '登録できませんでした';
}



if (!empty($_GET)){
  $itemData = $itm->deleteItemData($_GET['delete_flg'],$_GET['item_id']);
}else{
  $itemData  = $itm->getItemList();
}

$guide = "
         2020年00月00日(金)
         職種:
         現場名:
         最寄駅:〇〇駅
         服装:
         備考:";


$context['guide']=$guide;
$context['itemData']= $itemData;
$context['result'] = $msg;
$context['errmsg'] = $err_msg;
$template = $twig->loadTemplate('add_item.html.twig');
$template->display($context);

 ?>
