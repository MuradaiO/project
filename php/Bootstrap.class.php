<?php
/*
 *ファイルパス /Applications/MAMP/htdocs/project/php/bootstrap.class.php
 *ファイル名　Bootstrap.class.php （設定に関するプログラム）
 */
namespace php;

date_default_timezone_set('Asia/Tokyo');
require_once dirname(__FILE__) . './../vendor/autoload.php';

class Bootstrap
{
  const DB_HOST = 'localhost';
  const DB_NAME = 'test_db';
  const DB_USER = 'test_user';
  const DB_PASS = 'test_pass';
  const DB_TYPE = 'mysql';

  const APP_DIR = '/Applications/MAMP/htdocs/project/';
  const TEMPLATE_DIR = self::APP_DIR . 'templates/project/';
  const CACHE_DIR = false;

  const APP_URL  = 'http://localhost:8888/project/';
  const ENTRY_URL = self::APP_URL . 'php/';

  public static function loadClass($class)
  {
    $path = str_replace ('\\', '/', self::APP_DIR . $class . '.class.php');
    require_once $path;
  }
}
spl_autoload_register([
  'php\Bootstrap' ,
  'loadClass'
]);
