<?php
/**
 * ブラウザキャッシュ対策でのCSS・JS読み込み
 * @param string $srcFile ファイルパス
 */
function LoadItemWithNoCache($srcFile)
{
  // CSS
  if (strpos($srcFile, '.css'))
  {
    echo '<link rel="stylesheet" href="'.$srcFile.'?='.time().'">
  ';
  } else

  // JS
  if (strpos($srcFile, '.js'))
  {
    echo '<script type="text/javascript" src="'.$srcFile.'?='.time().'"></script>
  ';
  }
}
?>