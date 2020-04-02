<?php
/*
 *ファイルパス　/Applications/MAMP/htdocs/project/php/lib/entry.class.php
 *ファイル名　entry.class.php (entry関係のクラスファイル、Model)
 *
 */
namespace app\model;
require_once('Mail.class.php');

class Recruit extends Mail
{

  public $db = NULL;
  public static $table = " entry e LEFT JOIN item i ON e.item_id = i.item_id JOIN member m ON e.email = m.email ";
  public static $column = ' e.entry_id, e.entry_flg, m.mem_id, m.email, m.family_name, m.first_name, m.sex, i.item_id, i.item_name, i.price, i.ctg_id';

  public function __construct($db){

    // DBの登録
    $this->db = $db;
  }

  public function getEntryData($email,$template){
    switch ($template) {
      case 'entry_list_admin.html.twig':
      $where = ' NOT e.entry_flg = ?';
      $arrVal = [4];
        break;

      default:
      $where = ' e.email = ? AND NOT e.entry_flg = ? ';
      $arrVal = [$email, 4];
        break;
    }

    return $dataArr = $this->db->select(self::$table, self::$column, $where, $arrVal);

  }

  public function sendRecruitData($recruit, $entry_id){

    $insData = [' entry_flg ' => $recruit];
    $where = ' e.entry_id = ? ';
    $arrWhereVal = [ $entry_id ];


    $res = $this->db->update(self::$table, $insData, $where, $arrWhereVal);

    if ($res !== false){
      $res= $this->db->select(self::$table,self::$column,$where,$arrWhereVal);

    }
    return $res;
  }
}
