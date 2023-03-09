<?php
/**
 * Check Is the browser accessed From mobile?
 */
function is_mobile()
{
  $ua      = $_SERVER['HTTP_USER_AGENT'];
  $ua_list = array('iPhone','iPad','iPod','Android');

  foreach ($ua_list as $ua_smt)
  {
    if (strpos($ua, $ua_smt) !== false)
    {
      return true;
    }
  }
  
  return false;
}

/**
 * PC向けにテーマカラーヘッダーをセット
 * @param string $color HTML Color
 */
function set_theme_color_for_PC($color)
{
  if (!is_mobile())
  {
    echo '<meta name="theme-color" content="'.$color.'">'.PHP_EOL;
  }
}
?>
