<?php
/*
 *ファイルパス　/Applications/MAMP/htdocs/project/php/Item.class.php
 *ファイル名　Item.class.php (商品に関するプログラムのクラスファイル、Model)
 */
namespace php\lib;

class Item
{
  public $cateArr = [];
  public $db = null;

  public function __construct($db)
  {
    $this->db = $db;
  }
  // カテゴリーリストの取得
  public function  getCategoryList()
  {
    $table = ' category ';
    $col = ' ctg_id, category_name ';
    $res = $this->db->select($table, $col);
    return $res;
  }

  // 商品リストを取得する
  public function getItemList($ctg_id ='')
  {
    // カテゴリーによって表示させるアイテムをかえる
    $table = ' item ';
    $col = ' item_id, item_name, price, image, ctg_id ';
    $where = ($ctg_id !== '') ? ' ctg_id = ? AND NOT delete_flg = ?' : ' NOT delete_flg = ?';
    $arrVal = ($ctg_id !== '') ? [$ctg_id,4]  : [4];
    $res = $this->db->select($table, $col, $where, $arrVal);

    return ($res !== false && count($res) !== 0 ) ? $res : false;
  }

  // 商品の詳細情報を取得する
  public function getItemDetailData($item_id)
  {
    $table = ' item ';
    $col = ' item_id, item_name, detail, price, image, ctg_id ';

    $where = ($item_id !== '') ? ' item_id = ?' : '';
    // カテゴリーによって表示させるアイテムをかえる
    $arrVal = ($item_id !== '') ? [ $item_id ] : [];
    $res = $this->db->select($table, $col, $where, $arrVal );
    return ($res !== false && count($res) !== 0 ) ? $res : false;
  }
  public function insertItemData($dataArr)
  {
    $table = 'item';
    $res = $this->db->insert($table, $dataArr);
    return $res;

  }
  public function deleteItemData($delete_flg, $item_id){
    $table = 'item';
    $column = '';
    $insData = [' delete_flg ' => $delete_flg];
    $where = ' item_id = ? ';
    $arrWhereVal = [ $item_id ];


    $res = $this->db->update($table, $insData, $where, $arrWhereVal);

    if ($res !== false){
      $res= $this->getItemList();

    }
    return $res;
  }
  public function getItemImage($dataArr){
    if (empty($dataArr['image'])) {
      switch ($dataArr['ctg_id']){
      case 1:
      $dataArr['image'] = 'shop.jpg';
      break;

      case 2:
      $dataArr['image'] = 'wedding.jpg';
      break;

      case 3:
      $dataArr['image'] = 'zouen.jpg';
      break;

      case 4:
      $dataArr['image'] = 'shijo.jpg';
      break;

      case 5:
      $dataArr['image'] = 'lesson.jpg';
      break;


     }
    }
    return $dataArr;
  }
  public function imageCheck($tmp_image)
  {
    if ($tmp_image['error'] === 0 && $tmp_image['size'] !== 0){
      //正しくサーバにアップされているかどうか
      if (is_uploaded_file($tmp_image['tmp_name']) === true){
        // 画像状況を取得する
        $image_info = getimagesize($tmp_image['tmp_name']);
        $image_mime = $image_info['mime'];
        // 画像サイズが利用出来るサイズいないかどうか
        if ($tmp_image['size'] > 1048576){
          $err_msg =  'アップロードできる画像のサイズは、1MBまでです';
           // 画像の形式が利用出来るタイプかどうか
        } elseif (preg_match('/^image\/jpeg$/',$image_mime) === 0){
          $err_msg = 'アップロードできる画像の形式は、JPEG形式だけです';
        
        }elseif (move_uploaded_file($tmp_image['tmp_name'],
            '/Applications/MAMP/htdocs/project/php/images/'. $tmp_image['name']) === false) {
          $err_msg = '画像のアップロードに失敗しました';
        }
      }
  }
    return $err_msg = (isset($err_msg))? $err_msg : '';;
  }
}
 ?>
