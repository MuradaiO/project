<?php
/*
* ファイルパス：/Applications/MAMP/project/php/confirm.php
* ファイル名：confirm.php
* アクセスURL：http://localhost/project/php/confirm.php
*/
namespace php;
require_once ('../../bootstrap/data.php');
use php\master\initMaster;

// モード判定(どの画面から来たかの判断)
// 登録画面から来た場合

if (isset($_POST['confirm']) === true)
 {
   $mode = 'confirm';
 }
// 戻る場合
if (isset($_POST['back']) === true) {
  $mode = 'back';
}
// 登録完了
if (isset($_POST['complete']) === true) {
  $mode = 'complete';
}

if(isset($_POST['login'])) $mode = 'login';
if(isset($_POST['update'])) $mode = 'update';

// ボタンのモードよって処理をかえる
switch ($mode) {
  case 'confirm': // 新規登録
    // データを受け継ぐ
    // ↓この情報は入力には必要ない
    $dataArr = $_POST;
    unset($dataArr['confirm']);

    // この値を入れないでPOSTするとUndefinedとなるので未定義の場合は空白状態としてセットしておく
    if (isset($_POST['sex']) === false) {
      $dataArr['sex'] = "";
    }

    if (isset($_POST['traffic']) === false) {
      $dataArr['traffic'] = [];
    }
    // エラーメッセージの配列作成
    $errArr = $common->errorCheck($dataArr);
    $err_check = $common->getErrorFlg();

    // err_check = false →エラーがありますよ！
    // err_check = true →エラーがないですよ！
    // エラー無ければconfirm.tpl あるとregist.tpl

    $template = ($err_check === true) ? 'confirm.html.twig' : 'regist.html.twig';

  break;

  case 'back': // 戻ってきた時
    // ポストされたデータを元に戻すので、$dataArrにいれる
    $dataArr = $_POST;
    unset($dataArr['back']);
    // エラーも定義しておかないと、Undefinedエラーがでる

    foreach ($dataArr as $key => $value) {
      $errArr[$key] = '';
    }
    $template = 'regist.html.twig';
  break;

  case 'complete': // 登録完了
    $dataArr = $_POST;
     // ↓この情報はいらないので外しておく
    unset($dataArr['complete']);

    $res = $qdb->insertMember($dataArr);

    /*
    $trafficArr = [$dataArr['traffic']];
    foreach($trafficArr as $key=>$value){
      $traffic = implode('_', $value);
    }
    $dataArr['traffic'] = $traffic;
    $dataArr['regist_date'] = "NOW()";
    // Incorrect datetime valueとエラーが表示される
    $table='member';
    $res= $db->insert($table,$dataArr);
    $res = $con->insertMember($dataArr);
    */
    if ($res === true) {
    // 登録成功時はセッションに記憶させログイン画面へ
    $_SESSION = [];
    $_SESSION['email'] = $dataArr['email'];
    $_SESSION['password'] = $dataArr['password'];
    $_SESSION['result'] = '会員登録が完了しました';
    header('Location: ' . Bootstrap::ENTRY_URL . 'login.php');
    exit();
    } else {
    // 登録失敗時は登録画面に戻る
    $template = 'regist.html.twig';
    foreach ($dataArr as $key => $value) {
    $errArr[$key] = '';
    }}

  break;

  case 'login':
    unset($_POST['login']);
    $dataArr = $_POST;

    if(isset($dataArr['email']) === true && isset($dataArr['password'])  === true){
      $result = $mail->getMember($dataArr['email']);

    if( password_verify($dataArr['password'],$result[0]['password']) ){
      $_SESSION =[];
      $_SESSION['email'] = $result[0]['email'];
      $_SESSION['user_id'] = $result[0]['user_id'];
      $_SESSION['sex'] = $result[0]['sex'];
      $_SESSION['first_name'] = $result[0]['first_name'];
      $_SESSION['family_name'] = $result[0]['family_name'];
      $_SESSION['mem_id'] = $result[0]['mem_id'];


      header('Location:'. Bootstrap::ENTRY_URL . 'recruit/home.php');

      exit();
    }else{
      $errArr['result'] = 'ログインできませんでした';
      $template = 'login.html.twig';
    }
  } else {$errArr['result'] = 'メールアドレスまたはパスワードが空白です。';}
  break;

  case 'update':
   unset($_POST['update']);
   $dataArr = $_POST;

   foreach ($dataArr as $key => $value) {
     if ($key === 'traffic') $dataArr['traffic'] = implode('_', $value);
   }

   $res = $mem->memberUpdate($dataArr['mem_id'], $dataArr);
   if ($res === true) {
   // 登録成功時は完成ページへ
   header('Location: ' . Bootstrap::ENTRY_URL . 'member_list.php');
   exit();
   } else {
   // 登録失敗時は登録画面に戻る
   $template = 'member_update.html.twig';
   foreach ($dataArr as $key => $value) {
   $errArr[$key] = '';
   }}

}


$context['dataArr'] = $dataArr;
$context['errArr'] = $errArr;
$template = $twig->loadTemplate($template);
$template->display($context);
