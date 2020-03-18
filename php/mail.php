<?php
/*
 *ファイルパス　/Applications/MAMP/htdocs/project/php/mail.php
 * ファイル名　mail.php
 * アクセスURL　http://localhost/project/php/mail.php
 */
namespace php;
require_once ('data.php');
use php\master\initMaster;

if (isset($_POST['contact']) === true)
 {
   $mode = 'contact';
 }

// 勤怠報告(f-repoから)
if (isset($_POST['kintai']) === true) {
  $mode = 'kintai';
}


switch ($mode) {
  case 'contact':
    unset($_POST['contact']);
    $dataArr = $_POST;

    $errArr = $common->mailErrorCheck($dataArr);
    $errCheck = $common->getErrorFlg();

    if ($errCheck){
      $dataArr['result'] = $mail->sendMail($dataArr);
    }

    $template = 'contact-form.html.twig';
    break;

  case 'kintai':
    unset($_POST['kintai']);
    $dataArr = $_POST;

    $errArr = $common->kintaiCheck($dataArr);
    $errCheck = $common->getErrorFlg();

    if ($errCheck){
      $dataArr['result'] = $mail->sendKintai($dataArr);
    }
    $template = 'f-repo.html.twig';

    break;

}




$context['dataArr'] = $dataArr;
$context['errArr'] = $errArr;
/*
var_dump($context['dataArr']);
echo '<br>';
var_dump($context['errArr']);
*/
$template = $twig->loadTemplate($template);
$template->display($context);

 ?>
