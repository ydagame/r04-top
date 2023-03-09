<?php
define('MAX_NUM', 28);
define('PATH', '2023-Exhibition');
define('BANNER_DIR', $_SERVER['DOCUMENT_ROOT'].'/banner/');
?>

<?php
function getData($__num = -1, $path = PATH)
{
  $num    = $__num == -1 ? $_POST['num'] : $__num;
  $file   = fopen($_SERVER['DOCUMENT_ROOT'].'/datas/'.$path.'/changelog.txt', 'r');
  $result = false;

  while ($line = fgets($file))
  {
    $line = explode('setdata^', $line)[1];
    $args = explode('^', $line);

    if ($args[0] == $num)
    {
      $result = $args;
      $result[count($result) - 1] = str_replace(PHP_EOL, '', $result[count($result) - 1]);
    }
  }

  return $result;
}
?>

<?php
function writeData(string ...$datas)
{
  $date   = new DateTime();
  $format = $date->format('[Y/m/d - H:i:s]: ');
  $result = $format.'setdata';

  foreach ($datas as $data)
  {
    $result .= '^'.strval(urldecode($data));
  }

  $file = fopen($_SERVER['DOCUMENT_ROOT'].'/datas/'.PATH.'/changelog.txt', 'a');
  fwrite($file, $result.PHP_EOL);
  fclose($file);
}
?>