<?php
/*
 *ファイルパス/Application/MAMP/htdocs/DT/member/master/initMaster.class.php
 *ファイル名　initMaster.class.php
 */
namespace php\master;
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

  public static function getPersonal()
  {
    $PersonalArr = [
      '自己主張するのが下手だと思う' ,
      '常に未来に対して情熱をもっているほうだ',
      '他人のためにしたことを感謝されないと悔しく思うことがよくある',
      '嫌なことは嫌とはっきり言える',
      '人にはなかなか気を許さない',
      '人から楽しいとよく言われる',
      '短い時間にできるだけ多くのことをしようとする',
      '失敗しても立ち直りが早い',
      '人からものを頼まれるとなかなかノーと言えない',
      'たくさんの情報を検討してから決断をくだす',
      '人の話を聞くよりも自分が話していることの方が多い',
      'どちらかというと人見知りするほうだ',
      '自分と他人をよく比較する',
      '変化に強く適応力がある',
      '何事も自分の感情を表現することが苦手だ',
      '相手の好き嫌いに関わらず、人の世話をしてしまう方だ',
      '自分が思ったことはストレートに言う',
      '仕事の出来栄えについて人から認められた',
      '競争心が強い',
      '何事でも完全にしないと気がすまない'
    ];
    return $PersonalArr;
  }
}
 ?>
