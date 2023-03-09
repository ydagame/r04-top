<?php
require 'headerutil.php';
require 'data-manager.php';
?>
<?php
// 現在情報登録を受け付けておりません。
$out_of_date = true;
// $out_of_date = $_SERVER['REMOTE_ADDR'] != '220.100.46.163';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="author"   content="shopipi">
  <meta name="robots"   content="noindex,nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php set_theme_color_for_PC('#FFFFFF'); ?>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">

  <link rel="shortcut icon" href="form-icon.png?=<?php echo time(); ?>">

  <link rel="canonical"           href="https://ydagame.shopipi.app/[form]">
  <meta property="og:title"       content="ゲーム科トップページ内容変更フォーム">
  <meta property="og:url"         content="https://ydagame.shopipi.app/[form]">
  <meta property="og:site_name"   content="YDAゲーム科トップページ 2022-2023">
  <meta property="og:type"        content="website">
  <meta property="og:image"       content="">
  <meta property="og:description" content="ウェブサイトURL、プロジェクト名、バナー画像を変更できます">
  <meta name="twitter:card"       content="summary">
  <meta name="twitter:title"      content="ゲーム科トップページ内容変更フォーム">
  <meta name="description"        content="ウェブサイトURL、プロジェクト名、バナー画像を変更できます">

  <title>ゲーム科トップページ内容変更フォーム</title>
</head>
<body>
  <style>
    *
    {
      font-family: Arial, Helvetica, sans-serif;
    }
    body
    {
      margin: 0 !important;
      padding: 0 !important;
    }
    iframe
    {
      width: 100%;
      height: 100%;
      border: none !important;
      outline: none !important;
      position: fixed;
      inset: 0;
    }
    .info
    {
      font-size: 16px;
      font-weight: bold;
      color: gray;
      
      height: 20px;

      position: fixed;
      z-index: 2;
      left: 20px;
      bottom: 20px;

      display: flex;
      flex-direction: row;
      align-items: flex-start;
      justify-content: center;
    }
    .info > a
    {
      font-weight: bold;
      color: gray;
      margin-top: 2.2px;
    }
    .info > .icon
    {
      font-size: 22px;
    }
    .notice-wrapper
    {
      z-index: 10;
      width: 100%;
      height: 100%;
      
      position: fixed;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;

      font-size: 18px;
      color: gray;
    }
    .notice-wrapper > span
    {
      font-size: 96px;
      color: darkgray;
      margin-right: 20px;
    }
    .notice-text-wrapper
    {
      width: fit-content;
      text-align: left;
      line-height: 18px;
    }
    @media screen and (max-width: 480px)
    {
      .notice-wrapper
      {
        font-size: 3.5vw;
        flex-direction: column;
      }
      .notice-wrapper > span
      {
        font-size: 12vw;
      }
      .notice-text-wrapper
      {
        width: 90%;
      }
    }
  </style>
  <div class="notice-wrapper" style="display: <?php echo ($out_of_date ? 'flex' : 'none')?>;">
    <span class="material-symbols-outlined icon">info</span>
    <div class="notice-text-wrapper">
      <!-- <p>現在情報登録受付期間外です。</p> -->
      <!-- <p>次の発表会の準備が出来次第登録できるようになり、前回の発表会の情報は更新できなくなります。</p> -->
      <!-- <p>登録された情報は次の発表会に引き継がれ、再度更新が可能になります。</p> -->
      <p>2022年度の全ての発表会が終了しましたので、登録フォームは閉鎖となりました。</p>
      <p>1年間お疲れさまでした。</p>
    </div>
  </div>

  <?php
  if ($out_of_date) goto END;
  ?>

  <span class="info">
    <span class="material-symbols-outlined icon">info</span>&nbsp;
    <a href="<?php echo PATH ?>" target="_blank"><?php echo PATH; ?></a>の情報を変更します
  </span>
  <iframe frameborder="0" src="pages/form/search"></iframe>

  <?php
  END:
  ?>

</body>
</html>
