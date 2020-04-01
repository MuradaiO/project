<?php
/*
* ファイルパス：Applications/htdocs/project/php/postcode_search.php
* ファイル名：postcode_search.php
*/
namespace php;
require_once ('../../data.php');

if (isset($_GET['zip1']) === true && isset($_GET['zip2']) === true) {
  $zip1 = $_GET['zip1'];
  $zip2 = $_GET['zip2'];

   $query = " SELECT "
          . " pref, "
          . " city, "
          . " town "
          . " FROM "
          . " postcode "
          . " WHERE "
          . " zip = " . $qdb->str_quote($zip1 . $zip2)
          . " LIMIT 1 ";

   $res = $qdb->select($query);
  // 出力結果がajaxに渡される
  echo ($res !== "" && count($res) !== 0) ? $res[0]['pref'] . $res[0]['city'] . $res[0]['town'] : '';
} else {
  echo "no";
 }
