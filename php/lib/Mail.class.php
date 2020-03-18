<?php
/*
 *ファイルパス　/Applications/MAMP/htdocs/project/php/lib/mail.class.php
 *ファイル名　mail.class.php (mail関係のクラスファイル、Model)
 *
 */
namespace php\lib;
require_once('Common.class.php');

class Mail
{
  private static $to ='';
  public $session_key = '';
  public $db = NULL;

  public function __construct($db){
    mb_language("Japanese");
	  mb_internal_encoding("UTF-8");
    // DBの登録
    $this->db = $db;
  }
  public function getMember($email){
    $table = 'member';
    $column = '';
    $where = ' email = ? ';
    $arrVal = [$email];

    //var_dump($arrVal);
   $result = $this->db->select($table, $column , $where , $arrVal);
   return $result;
  }

  public function sendMail($dataArr){
    $title =  $dataArr['title'];
    $content = $dataArr['email'] . "さんからお問い合わせがありました。<br>"
             . $dataArr['contents'];

    return $res = (mb_send_mail(self::$to, $title, $content) !== false) ? 'メールを送信しました' : 'メールの送信に失敗しました';
  }

  public function sendEntry($email,$dataArr){
    $res = $this->getMember($email);

    if($res !== false){
      $res = $res[0];
      $title = "エントリー情報 : " . $res['family_name'] . $res['first_name'] ;
      $content = "\n メンバー : " . $res['family_name'] . $res['first_name'] . "(". $res['family_name_kana'] . $res ['first_name_kana'] .")";
      $content .= ($res['sex'] == 1) ? "( 男性 )" : "( 女性 )";
      $content .= "\n 住所 : ". $res['zip1'] . "-" . $res['zip2']  . "  " .$res['address'] . " 交通手段: " . $res['traffic']
               . "\n  電話 : "  .$res['tel1']  ." - ". $res['tel2'] ." - ". $res['tel3'] . "  メール : " .$res['email'] . "\n 案件:";

      foreach($dataArr as $val){
        $content .= "\n" . $val['item_name'] . "日当 : " . $val['price'] ;
      }
     $entry = (mb_send_mail(self::$to, $title, $content) !== false)?
        $entry = "エントリーを受け付けました" :
        false;
    }
    return $entry;
  }
  public function sendMailRecruit($staff, $recruit){

    $staffEmail = $staff['email'];
    $title = "選考結果のご連絡";
    $content = $staff['family_name']. $staff['first_name'] . " 様 \n "
             . "お世話になっております、daihana事務局です。 \n"
             . "今回は ". $staff['item_name'] . " にご応募いただき、誠にありがとうございます。 \n"
             . "今回の選考についてですが、慎重に選考した結果、";

    switch ($recruit) {
      case 1:
        $content .= '応募を受け付けました。詳細をご確認の上、当日は遅刻のないよう、よろしくお願いします。';
        break;

      default:
        $content .= "今回はご希望に添えない結果となりました。ご理解のほどをよろしくお願いします。";
        break;
    }

    return $entry = (mb_send_mail($staffEmail, $title, $content) !== false)?
       $entry = "選考結果を送信しました　受付　ID: ". $staff['entry_id'] :
       false;
  }

  public function sendKintai($dataArr){

    $title = '勤怠報告 : ' . $dataArr['family_name'] . $dataArr['first_name'] . '日付:'
            . $dataArr['year'] ." / ". $dataArr['month'] . " / " . $dataArr['day'];

    $content =  $dataArr['email'] .
              "\n 派遣先名: ". $dataArr['address'] .
              "\n 交通費: " . $dataArr['spend'] .
              "\n 始業時間: " . $dataArr['start'] .
              "\n 就業時間: " . $dataArr['end'] .
              "\n " . $dataArr['contents'] ;

    return $res = (mb_send_mail(self::$to, $title, $content) !== false) ? '勤怠を送信しました' : '勤怠の送信に失敗しました';
  }
}
