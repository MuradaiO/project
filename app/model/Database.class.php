<?php
/*
* ファイルパス：/Applications/MAMP/htdocs/project/php/Database.class.php
* ファイル名：Database.class.php
*/
namespace app\model;
class Database
{
  public $db_con = null;
  public $db_host = '';
  public $db_user = '';
  public $db_pass = '';
  public $db_name = '';

  public function __construct($db_host, $db_user, $db_pass, $db_name)
  {
    $this->db_con = $this->connectDB($db_host, $db_user, $db_pass, $db_name);
    $this->db_host = $db_host;
    $this->db_user = $db_user;
    $this->db_pass = $db_pass;
    $this->db_name = $db_name;
  }
  private function connectDB($db_host, $db_user, $db_pass, $db_name)
  {
    $tmp_con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if ($tmp_con !== false) {
      return $tmp_con;
    } else {
      printf("Connect failed: %s\n", mysqli_connect_error());
      // sprintf：フォーマットされた文字列を返す(変数に代入可能)。例：2桁(4桁)にしたい。
     exit();
    }
  }

  public function insertMember($dataArr){
    $column = '';
    $insData = '';
    // foreachの中でSQL文を作る
    foreach ($dataArr as $key => $value) {
        $column .= $key . ', ';
      if ($key === 'traffic') $value = implode('_', $value);
      // パスワードのハッシュ化
      if($key === 'password') $value = password_hash($value, PASSWORD_DEFAULT);

      $insData .= ($key === 'sex') ? $this->quote($value) . ',' : $this->str_quote($value) . ', ';
    }

    $query = " INSERT INTO member ( "
             . $column
             . " regist_date "
             . " ) VALUES ( "
             . $insData
             . " NOW() "
             . " ) ";

    $res = $this->execute($query);

    return $res;
  }


  public function execute($sql)
  {
    return mysqli_query($this->db_con, $sql);
  }

  public function select($sql)
  {
    $res = $this->execute($sql);
    $data = [];
    while ($row = mysqli_fetch_array($res)) {
    array_push($data, $row);
    }
    // mysql_free_result( $res );
    return $data;
  }

  public function quote($int)
  {
    return mysqli_real_escape_string($this->db_con, $int);
   }

  public function str_quote($str)
  {
    return "'" . mysqli_real_escape_string($this->db_con, $str) . "'";
  }

  public function getLastId()
  {
    return mysqli_insert_id($this->db_con);
  }

  public function close()
  {
    mysqli_close($this->db_con);
  }
}
