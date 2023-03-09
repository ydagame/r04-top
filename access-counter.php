<?php
// form redirect?
if (strpos($_SERVER['HTTP_REFERER'], '/form') !== false) return;

// my home remote addr
if ($_SERVER["REMOTE_ADDR"] === '220.100.46.163') return;

// my mobile remote addr
if ($_SERVER["REMOTE_ADDR"] === '210.138.208.134') return;

$date   = new DateTime();
$format = $date->format('[Y/m/d - H:i:s]: ');
$result = $format.'Accesses [to: '.$_SERVER['REQUEST_URI'].'] [from: '.$_SERVER['HTTP_REFERER'].'] [by: '.$_SERVER["REMOTE_ADDR"].']'.PHP_EOL;

$file = fopen($_SERVER['DOCUMENT_ROOT'].'/datas/'.$page.'/'.(!$early_access ? 'accesslog.txt' : 'accesslog-early.txt'), 'a');
fwrite($file, $result);
fclose($file);
?>