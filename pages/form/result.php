<?php date_default_timezone_set('Asia/Tokyo');?>

<?php
session_start();
require '../../functions.php';
require '../../data-manager.php';
?>

<?php
$platform_PC      = !is_null($_POST['PC'])       ? 'true' : 'false';
$platform_mobile  = !is_null($_POST['mobile'])   ? 'true' : 'false';
$platform_VR      = !is_null($_POST['VR'])       ? 'true' : 'false';
$platform_Arcade  = !is_null($_POST['Arcade'])   ? 'true' : 'false';
$platform_esports = !is_null($_POST['e-sports']) ? 'true' : 'false';
$platform_other   = !is_null($_POST['other'])    ? 'true' : 'false';
?>

<?php
list($num, $display_name, $project_name, $url, $banner_img) = getData($_POST['num']);

/**
 * データを上書き
 */
$project_name = htmlspecialchars($_POST['project_name'], ENT_QUOTES);
$url          = htmlspecialchars($_POST['url'],          ENT_QUOTES);

/**
 * 短縮URL展開
 */
$target_headers = get_headers($url, true);
if ( isset($target_headers['Location']) &&
    !is_array($target_headers['Location']))
{
  $url = $target_headers['Location'];
}

$_SESSION['__NUM'] = $num;

/**
 * エラーが起きたかどうか
 */
$is_error = false;

if (!empty($_FILES))
{
  // ファイルサイズオーバー
  if ($_FILES['banner_img']['error'] == UPLOAD_ERR_INI_SIZE)
  {
    $is_error = true;
  } else

  // ファイルサイズOK
  {
    $filename  = $_FILES['banner_img']['name'];
    $extension = substr($filename, strrpos($filename, '.'));
    $path      = BANNER_DIR.$num.'-'.uniqid().$extension;

    $result = move_uploaded_file($_FILES['banner_img']['tmp_name'], $path);
    
    // アップロード完了
    if ($result)
    {
      // セット
      $banner_img = str_replace(BANNER_DIR, '', $path);
    }
  }
}

if (!$is_error)
{
  writeData($num, $display_name, $project_name, $url, $banner_img,
            $platform_PC, $platform_mobile, $platform_VR, $platform_Arcade, $platform_esports, $platform_other);
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <?php
  LoadItemWithNoCache('../../css/style.css');
  LoadItemWithNoCache('../loading.js');
  ?>
  <title>完了</title>
</head>

<body>

  <div class="complete">
    <?php
    if (!$is_error)
    {
      echo
      '<h1>保存が完了しました</h1>
      <i class="far fa-check-circle" style="color: #00bb00;"></i>';
    }
    else
    {
      echo
      '<h1>保存に失敗しました</h1>
      <h2>画像サイズが大きすぎます（'.ini_get('upload_max_filesize').'Bまで）</h2>
      <i class="fas fa-times" style="color: #e20000;"></i>';
    }
    ?>
  </div>

  <?php
  $top_url = 'https://ydagame.shopipi.app/'.PATH;
  ?>
  <div class="back-btn-wrapper">
    <button class="back-btn" onclick="window.open('<?php echo $top_url; ?>', '_blank');">確認する</button>
    <button class="back-btn" onclick="window.location.replace('edit');">戻る</button>
    <button class="back-btn" onclick="window.location.replace('search');">終了する</button>
  </div>

</body>

</html>