<?php
/*
 *ファイルパスApplications/MAMP/htdocs/project/php/entry_list.php
 *ファイル名　entry_list.php
 *アクセスURL　http://localhost:8888/htdocs/project/entry_list.php
 */
namespace php;
require_once ('../../../bootstrap/data.php');
use php\master\initMaster;

$template = ($_SESSION['user_id'] === 'admin') ? '/tasks/entry_list_admin.html.twig' : '/tasks/entry_list.html.twig';

$email = $_SESSION['email'];

$dataArr = $rec->getEntryData($email, $template);



if (isset($_GET['recruit'], $_GET['entry_id'])) {
  switch ($template) {
    case 'entry_list_admin.html.twig':
    $res = $rec->sendRecruitData($_GET['recruit'], $_GET['entry_id']);
    if ($res !== false){

      $dataArr['result'] = $mail->sendMailRecruit($res[0], $recruit);
    }
      break;

    default:
      $res = $rec->sendRecruitData($_GET['recruit'], $_GET['entry_id']);
      break;
  }

}

$dataArr = $rec->getEntryData($email, $template);





$context['dataArr'] = $dataArr;


$template = $twig->loadTemplate($template);
$template->display($context);

 ?>
