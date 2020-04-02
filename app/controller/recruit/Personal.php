<?php
/*
 *ファイルパス : /Applications/MAMP/htdocs/project/php/Personal.php
 *ファイル名 Personal.php
 *アクセスURL　http://localhost:8888/project/php/Personal.php
 */
 namespace php;

 require_once ('../../../bootstrap/data.php');

 use php\master\initMaster;

 $template='/tasks/personal.html.twig';

 $table = 'personal';
 $dataArr = $db->select($table);

 if (isset($_POST['personal']) === true) {
 $perArr = $_POST;
 unset($perArr['personal']);

 $con = 11;
 $pro = 12;
 $sapo = 12;
 $ana = 13;

 $con -= $perArr['con'] + $perArr['con1'] + $perArr['con2'] + $perArr['con3'] + $perArr['con4'];
 $pro -= $perArr['pro'] + $perArr['pro1'] + $perArr['pro2'] + $perArr['pro3'] + $perArr['pro4'];
 $sapo -= $perArr['sapo'] + $perArr['sapo1'] + $perArr['sapo2'] + $perArr['sapo3'] + $perArr['sapo4'];
 $ana -= $perArr['ana'] + $perArr['ana1'] + $perArr['ana2'] + $perArr['ana3'] + $perArr['ana4'];

 $resArr = [$con,$pro,$sapo,$ana];
$template = '/tasks/personal.html.twig';
}
 $perArr = [];




 $context['result'] = $resArr;
 $context['dataArr'] = $dataArr;

 $template = $twig->loadTemplate($template);
 $template->display($context);

?>
