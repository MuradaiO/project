<?php
/*
 *ファイルパス　/Applications/MAMP/htdocs/project/php/cart.php
 *ファイル名　cart.php
 *アクセスURL　http://localhost/project/php/cart.php
 */
namespace php;

require_once ('../../../bootstrap/data.php');
//var_dump($_SESSION);echo '<br>';
// セッションに、セッションIDを設定する
$ses->checkSession();
$customer_no = $_SESSION['customer_no'];
$email = $_SESSION['email'];

// item_idを取得する
$item_id = (isset($_GET['item_id']) === true && preg_match('/^\d+$/', $_GET['item_id']) === 1) ? $_GET['item_id'] : '';
$crt_id = (isset($_GET['crt_id']) === true && preg_match('/^\d+$/', $_GET['crt_id']) === 1) ? $_GET['crt_id'] : '';
$ukeou = (isset($_GET['ukeou']) === true && preg_match('/^\d+$/', $_GET['ukeou']) === 1) ? $_GET['ukeou'] : '';



// item_idが設定されていれば、ショッピングカートに登録する
if ($item_id !== '') {
  $dataArr = $cart->getCartData($customer_no);
  if(isset($dataArr) === false){
    $res = $cart->insCartData($customer_no, $item_id);
    exit();
  }else{
    foreach($dataArr as $val){
      $a_item_id = [];
      $a_item_id[]  = $val['item_id'];
    }
    if ( in_array($item_id, $a_item_id) ){
      $entry = 'すでにリストに追加されています';

    }else{
      $res = $cart->insCartData($customer_no, $item_id);
    }
  }

}

// カート情報を取得する
$dataArr = $cart->getCartData($customer_no);
// アイテム数と合計金額を取得する。listは配列をそれぞれの変数に分ける
// $cartSumAndNumData = $cart->getItemAndSumPrice($customer_no);
list($sumNum, $sumPrice) = $cart->getItemAndSumPrice($customer_no);





// crt_idが設定されていれば、削除する
if ($crt_id !== ''){
  $res = $cart->delCartData($crt_id);
}


if($ukeou !== ''){
  $entry = $mail->sendEntry($email,$dataArr);
  var_dump($entry);
  //エントリーが成功した場合カート情報を削除する
  if($entry !== false) {
     foreach ($dataArr as $value){
       $res = $cart->delCartData($value['crt_id']);
       $entryData = [
         "email" => $_SESSION['email'],
          "item_id" => $value['item_id']
      ];
      $table="entry";
      $db->insert($table, $entryData);
     }
  }
}

// カート情報を取得する
$dataArr = $cart->getCartData($customer_no);
// アイテム数と合計金額を取得する。listは配列をそれぞれの変数に分ける
// $cartSumAndNumData = $cart->getItemAndSumPrice($customer_no);
list($sumNum, $sumPrice) = $cart->getItemAndSumPrice($customer_no);


$context['result'] = $entry;
$context['sumNum'] = $sumNum;
$context['sumPrice'] = $sumPrice;
$context['dataArr'] = $dataArr;

$template = $twig->loadTemplate('tasks/cart.html.twig');
$template->display($context);
 ?>
