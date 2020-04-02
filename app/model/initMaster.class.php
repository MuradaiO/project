<?php
/*
 *ファイルパス/Application/MAMP/htdocs/DT/member/master/initMaster.class.php
 *ファイル名　initMaster.class.php
 */
namespace app\model;
class initMaster
{
  public static function getDate()
  {
    $yearArr =[];
    $monthArr = [];
    $dayArr = [];
    $next_year = date('Y') + 1;

    // 年を作成
    for ( $i = date('Y');  1900 < $i ; $i --)
    {
      $year = sprintf("%04d", $i);
       //$year = arsort($year);
      $yearArr[$year] = $year . '年';
    }
    // 月を作成
    for ($i = 1; $i < 13;$i++){
      $month = sprintf("%02d" , $i);
      $monthArr[$month] = $month . '月';
    }
    // 日を作成
    for ($i = 1; $i < 32; $i ++){
      $day = sprintf("%02d", $i);
      $dayArr[$day] = $day . '日';
    }
    return [$yearArr,$monthArr,$dayArr];
  }

  public static function getSex()
  {
    $sexArr = ['1' =>'男性' , '2' => '女性'];
    return $sexArr;
  }

  public static function getTrafficWay()
  {
    $trafficArr = ['徒歩' , '自転車' , 'バス' , '電車' , '車・バイク'];
    return $trafficArr;}

  public static function getCtgId()
  {
    $ctg_id = [
      1 =>'花屋',
      2 =>'ブライダル・葬儀',
      3 =>'アトリエ・造園' ,
      4 =>'流通・仲卸（市場）',
      5=>'ワークショップ（講師）'];
   return $ctg_id;
  }

  public static function getRegistArr()
  {
    $dataArr = [
      'family_name' => '',
      'first_name' => '',
      'family_name_kana' => '',
      'first_name_kana' => '',
      'sex' => '',
      'year' =>'',
      'month' => '',
      'day' => '',
      'zip1' =>'',
      'zip2' =>'',
      'address' => '',
      'email' => '',
      'tel1' => '',
      'tel2' => '',
      'tel3' => '',
      'traffic' => '',
      'contents' => '',
      'password' => ''
    ];
    return $dataArr;
  }
}
 ?>
