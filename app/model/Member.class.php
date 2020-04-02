<?php
/*
 *ファイルパス　/Applications/MAMP/htdocs/project/php/lib/Member.class.php
 *ファイル名　Member.class.php (メンバーに関するプログラムのクラスファイル、Model)
 */
namespace app\model;

class Member
{
  public $db = null;
  private static $table = ' member ';
  public function __construct($db)
  {
    $this->db = $db;
  }


  // カート情報を削除する：必要な情報はどのカートを($crt_id)
  public function memberUpdate($mem_id,$update_data)
  {
    $insData = $update_data;
    $where = ' mem_id = ? ';
    $arrWhereVal = [$mem_id];

    return $this->db->update(self::$table, $insData, $where, $arrWhereVal);
  }

  public function memberSelect($mem_id){
    $table = ' member ';
    $clumn = '';
    $where = ' mem_id = ?';
    $arrVal = [ $mem_id ];

    return $dataArr = $this->db->select(self::$table, $clumn, $where, $arrVal);

  }
}
?>
