<?php
/*
 *ファイルパス Applications/MAMP/htdocs/project/php/logout.php
 *ファイル名 logout.php
 *アクセスURL　http://localhost/project/php/logout.php
 */
namespace php;

require_once ('data.php');


$dataArr = [];

if (isset($_SESSION) === true) {
   $dataArr['message'] = 'Logoutしました。';
} else {
  $dataArr['message'] = 'SessionがTimeoutしました。';
}

//セッション変数のクリア
$_SESSION = array();
//セッションクッキーも削除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
@session_destroy();


$context = [];

$context['dataArr'] = $dataArr;
$context['errArr'] = $erraArr;

$template = $twig->loadTemplate('logout.html.twig');
$template->display($context);

?>
