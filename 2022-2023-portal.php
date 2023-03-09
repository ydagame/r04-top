<!---------------------------------------------------

(C) YDA Game / Shoichi Kawasaki, All rights reserved.

---------------------------------------------------->
<?php
date_default_timezone_set('Asia/Tokyo');
require 'functions.php';
require 'headerutil.php';
?>

<?php
$_IS_OPEN_FOR_PUBLIC = true;
?>

<?php
/**
 * 学園祭特別ページ公開設定
 */
$_ALLOW_SHOW_FESTIVAL =
  // ($_SERVER['REMOTE_ADDR'] == '220.100.46.163') ||
  ($_GET['q'] === 'secret');
?>

<?php
$page_names =
[
  '2022-Debug',
  '2022-Summer',
  '2022-Festival',
  '2023-Exhibition'
];

$page_titles[$page_names[0]] = 'DEBUG';
$page_titles[$page_names[1]] = '前期発表会';
$page_titles[$page_names[2]] = '学園祭';
$page_titles[$page_names[3]] = 'YDA Exhibition';

$early_access = boolval($_GET['early-access']);

$href = urldecode($_SERVER['REQUEST_URI']);
$page = explode('/', $href)[1];

$queries = explode('?', $page)[1];
$queries = $queries != '' ? '?'.$queries : '';

$page  = explode('?', $page)[0];
$match = false;

foreach ($page_names as $page_name)
{
  // マッチした
  if ($page == $page_name)
  {
    $match = true;
    break;
  }

  // マッチした
  if (strpos($page_name, $page) !== false ||
      strpos($page, $page_name) !== false)
  {
    // href書き換え（Query継承）
    header('Location: /'.$page_name.$queries);
    $match = true;
  }
}

// チェックページ
if ($page == '[check]')
{
  include '2022-2023-check.php';
  return;
}

// フォーム
if ($page == '[form]')
{
  include '2022-2023-form.php';
  return;
}

// 該当なし
if (!$match)
{
  header('Location: /2022'.$queries);
  return;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="author"      content="shopipi">
  <meta name="robots"      content="noindex,nofollow">
  <meta name="viewport"    content="width=device-width, initial-scale=1.0">
  <?php set_theme_color_for_PC('#FFFFFF'); ?>
  
  <!-- Icon -->
  <link rel="shortcut icon" href="https://yt3.ggpht.com/ytc/AMLnZu9uxqOEFZxOgo2-8sMlgAYXdJ_uYhbzNWxaz2iT=s900-c-k-c0x00ffffff-no-rj">

  <!-- CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">
  <?php
  if ($page_name !== '2022-Debug' &&
      $page_name !== '2023-Exhibition')
  {
    LoadItemWithNoCache('css/banner-container.css');
    LoadItemWithNoCache('css/portal.css');
    LoadItemWithNoCache('css/scroll.css');
  }

  LoadItemWithNoCache('css/loading.css');
  ?>
  
  <?php
  /**
   * お待ちください...
   */
  if (!$_IS_OPEN_FOR_PUBLIC && !$early_access)
  {
    LoadItemWithNoCache('css/waiting.css');
  }
  ?>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
  <?php
  LoadItemWithNoCache('js/script.js');
  LoadItemWithNoCache('js/portal.js');
  LoadItemWithNoCache('js/photoslide.js');
  LoadItemWithNoCache('js/banner.js');
  ?>

  <?php
  // 学園祭
  if ($page_name === '2022-Festival' && $_ALLOW_SHOW_FESTIVAL)
  {
    LoadItemWithNoCache('css/2022-Festival.css');
  }
  // Debug or Exhibition
  if ($page_name === '2022-Debug' ||
      $page_name === '2023-Exhibition')
  {
    LoadItemWithNoCache('css/2023-Exhibition.css');
    LoadItemWithNoCache('js/2023-Exhibition.js');
  }
  ?>

  <link rel="canonical"           href="https://ydagame.shopipi.app/<?php echo $page; ?>">
  <meta property="og:title"       content="<?php echo $page_titles[$page]; if ($early_access) echo ' | 早期アクセス' ?>">
  <meta property="og:url"         content="https://ydagame.shopipi.app/<?php echo $page; ?>">
  <meta property="og:site_name"   content="<?php if ($early_access) echo '[早期アクセス版] ' ?>YDAゲーム科トップページ 2022-2023">
  <meta property="og:type"        content="website">
  <meta property="og:image"       content="https://pbs.twimg.com/profile_images/1415936999953821697/TOw3awWd_400x400.jpg">
  <meta property="og:description" content="横浜デジタルアーツ専門学校のゲーム科の発表会用トップページです">
  <meta name="twitter:card"       content="summary">
  <meta name="twitter:title"      content="<?php echo $page_titles[$page]; ?> | YDAゲーム科トップページ 2022-2023">
  <meta name="description"        content="横浜デジタルアーツ専門学校のゲーム科の発表会用トップページです">
  <title><?php echo $page_titles[$page]; if ($early_access) echo ' | 早期アクセス' ?> | YDAゲーム科トップページ 2022-2023</title>
</head>

<?php
if ($page_name === '2022-Debug' ||
    $page_name === '2023-Exhibition')
{
  include 'pages/top/exhibition/exhibition.php';
  return;
}
?>

<body style="overflow: hidden;">
  <?php
  if ($page_name == '2022-Festival' && $_ALLOW_SHOW_FESTIVAL)
  {
    echo '<div class="fireworks"></div>';
  }
  ?>

  <!-- フォント読み込み完了イベント -->
  <script>
    document.fonts.ready.then(function()
    {
      // Hide Loading
      $('div.loading-wrapper').css('display', 'none');

      // Scroll Enable
      $('body').css('overflow', 'visible');

      <?php
      if (!$early_access && !$_IS_OPEN_FOR_PUBLIC)
      {
        echo '
        // お待ちくださいテキストアニメーション開始
        waiting_display();';
      }
      ?>
    });
  </script>

  <!-- 読み込み中 -->
  <div class="loading-wrapper">
    <div class="loading-text">LOADING</div>

    <!-- 参考: https://codepen.io/Iulius90/pen/RaeWmY -->
    <div class="gauge-loader"></div>

    <!-- 参考: https://codepen.io/edoardoo/pen/qBpgJz -->
    <!-- <div class="circle"><div class="outer"><div class="middle"><div class="inner"></div></div></div></div> -->
  </div>

  <?php
  if ($_IS_OPEN_FOR_PUBLIC || $early_access)
  {
    goto BODY_WRAPPER;
  }
  ?>
  <span class="waiting">　</span>
  <script>
    /**
     * お待ちくださいテキストアニメーション
     */
    function waiting_display()
    {
      let text = `一般公開までしばらくお待ちください...`;
      let i    = 1;

      let timer = setInterval(() =>
      {
        $(`span.waiting`).text(text.substring(0, i++));

        if (i > text.length)
        {
          clearInterval(timer);
        }
      }, 128);
    }
  </script>

  <?php
  BODY_WRAPPER:
  ?>

  <div class="body-wrapper">

    <!-- Header -->
    <header class="photo-slide">
      <div class="title">
        <?php
        if ($page_name == '2022-Festival') echo
        '<div class="party-hat"></div>'
        ?>
        <span style="color: #F4F5F7;">YDA</span>
        <span style="color: #F4F5F7;"><?php echo $page_titles[$page]; ?></span>
        <span style="color: #F4F5F7;">2022</span>
        <span style="color: #FF0066;"">ゲーム科</span>
      </div>
    </header>

    <?php
    if (!$_IS_OPEN_FOR_PUBLIC)
    if ($_GET['early-access'] != 'true')
    {
      goto FOOTER;
    }
    ?>

    <!-- 参考: https://codepen.io/hexagoncircle/pen/aZWOdE -->
    <div class="scroll-anim">
      <div class="mouse"></div>
      <p>Scroll</p>
    </div>

    <!-- Header Column -->
    <div class="header-column"></div>

    <!-- Move To Top -->
    <i class="fas fa-angle-up move-to-top"></i>

    <!-- チームバナー -->
    <?php
    if ($page_name !== '2022-Debug')
    {
      include 'pages/top/banner-container-'.$page.'.php';
    }
    ?>

    <?php
    // アクセスログ発生
    if ($_IS_OPEN_FOR_PUBLIC || $early_access)
    {
      include 'access-counter.php';
    }
    ?>
    
    <?php
    FOOTER:
    ?>

    <!-- Footer -->
    <footer>
      <div class="copy-name">
        <i class="far fa-copyright"></i>&nbsp;&nbsp;2022<?php if (date("Y") >= 2023) echo '-2023'; ?>&nbsp;&nbsp;YDA Game&nbsp;&nbsp;/&nbsp;&nbsp;Shoichi Kawasaki
      </div>
    </footer>

  </div>
</body>
</html>