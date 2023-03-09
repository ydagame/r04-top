<?php date_default_timezone_set('Asia/Tokyo');?>
<?php
session_start();
require '../../functions.php';
require '../../data-manager.php';

$__num = -1;

if ($_SESSION['__NUM'] != '')
{
  $__num = intval($_SESSION['__NUM']);
}

$data = getData($__num);

list($num, $display_name, $project_name, $url, $banner_img,
     $platform_PC, $platform_mobile, $platform_VR, $platform_Arcade, $platform_esports, $platform_other) = $data;

session_unset();

if ($data === false)
{
  echo '<h1>見つかりませんでした</h1>'."\n";
  return;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
  <?php
  LoadItemWithNoCache('../../css/style.css');
  // LoadItemWithNoCache('../../css/banner-container.css');

  LoadItemWithNoCache('../../css/2023-Exhibition.css');
  
  LoadItemWithNoCache('../../js/preview.js');
  // LoadItemWithNoCache('../../js/banner.js');
  ?>

  <title>ゲーム科トップページ内容変更申請フォーム</title>
</head>

<body onload="loaded()">
  <?php
  setcookie('__NUM', $num, time() + 60 * 60 * 24 * 365);
  ?>

  <style>
    .banner-img-wrapper:hover
    {
      transform: inherit !important;
    }
  </style>

  <div class="p-wrapper">
    <div class="wrapper">
      <form action="result" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="title">
          <h3>2. 情報を更新</h3>
        </div>
        <div class="editor">
          <label for="display_name">チーム名</label>
          <input type="text" disabled name="display_name" value="<?php echo $display_name; ?>">

          <label for="project_name">プロジェクト名</label>
          <input type="text" name="project_name" placeholder="Paste or Enter Project Name Here..." value="<?php echo $project_name; ?>" id="project_name">
          <span class="error error-1">　</span>

          <label for="url">ウェブサイトURL</label>
          <input type="text" name="url" placeholder="Paste or Enter URL Here..." value="<?php echo $url; ?>" id="url">
          <span class="error error-2">　</span>

          <label for="banner_img" style="width: fit-content;">
            バナー画像（<?php echo ini_get('upload_max_filesize'); ?>Bまで）
          </label>
          <input type="file" name="banner_img" accept=".png, .jpg, .jpeg" id="banner_img" style="width: fit-content;">

          <label for="platforms">
            プラットフォーム<br>
            <span style="font-size: 12px;">
              ※ゲームの場合はプレイ可能なプラットフォーム全てにチェックを入れて下さい
            </span>
          </label>
          <div class="platforms">
            <div>
              <input type="checkbox" id="PC" name="PC" <?php if ($platform_PC === 'true') echo 'checked';?>>
              <label for="PC">PCゲーム</label>
            </div>
            <div>
              <input type="checkbox" id="mobile" name="mobile" <?php if ($platform_mobile === 'true') echo 'checked';?>>
              <label for="mobile">モバイルゲーム</label>
            </div>
            <div>
              <input type="checkbox" id="VR" name="VR" <?php if ($platform_VR === 'true') echo 'checked';?>>
              <label for="VR">VRゲーム</label>
            </div>
            <div>
              <input type="checkbox" id="Arcade" name="Arcade" <?php if ($platform_Arcade === 'true') echo 'checked';?>>
              <label for="Arcade">アーケードタイプ</label>
            </div>
            <div>
              <input type="checkbox" id="e-sports" name="e-sports" <?php if ($platform_esports === 'true') echo 'checked';?>>
              <label for="e-sports">e-sports</label>
            </div>
            <div>
              <input type="checkbox" id="other" name="other" <?php if ($platform_other === 'true') echo 'checked';?>>
              <label for="other">IT・その他</label>
            </div>
          </div>
          <input type="tel" name="num" hidden value="<?php echo $num; ?>">

          <input type="submit" value="保存" class="submit">
        </div>
      </form>
    </div>
    <div class="wrapper">
      <div class="title">
        <h3>プレビュー</h3>
      </div>
      <?php
      // include '../top/banner.php';
      include '../top/exhibition/team-banner.php';
      ?>
    </div>
  </div>

  <div class="back-btn-wrapper">
    <button class="back-btn" onclick="window.location.href = 'search';">戻る</button>
  </div>

</body>

</html>
