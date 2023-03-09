<?php
// pathを現在のページに設定
if (isset($page)) $path = $page;
?>

<?php
require 'data-manager.php';
?>

<?php
$datas = [ null ];

for ($i = 1; $i <= MAX_NUM; $i++)
{
  array_push($datas, getData($i));
}
?>

<body>
  <div class="body-wrapper" style="visibility: collapse;">
    <header>
      <div class="yda-logo">
        <div class="img"></div>
      </div>
      <div class="background">
        <div class="header-caption">
          <p class="PC-only">YDA Exhibition</p>
          <p class="mobile-only">YDA</p>
          <p class="mobile-only">Exhibition</p>
          <p style="color: var(--game-class-color);">ゲーム科</p>
        </div>
      </div>
      <div class="rooms-view-wrapper">
        <div class="caption">展示教室一覧</div>
        <div class="tiles">
          <?php
          function print_room_tile($caption_id, $caption, $room_str, $tile_background, $has_link = true)
          {
            include 'room-tile.php';
          }
          print_room_tile('_3', '3年生', 'in 2-503 / 2-504', ['datas/2023-Exhibition/Photos/3GM_1.jpg', 'datas/2023-Exhibition/Photos/3GM_2.jpg']);
          print_room_tile('_2', '2年生', 'in 2-502 / 2-505', ['datas/2023-Exhibition/Photos/2GM_1.jpg', 'datas/2023-Exhibition/Photos/2GM_2.jpg']);
          print_room_tile('_1', '1年生', 'in 2-501（会場での展示のみ）', 'datas/2023-Exhibition/Photos/1GM.jpg', false);
          print_room_tile('_e', 'e-sports', 'in 2-506', 'datas/2023-Exhibition/Photos/ES.jpg');
          ?>
        </div>
        <!-- <span style="color: red; font-weight: bold;">※現在は学園祭の時の写真をサンプル画像として使用しています</span> -->
        <!-- <a href="https://www.kansaigaidai.ac.jp/asp/img/pdf/82/7a79c35f7ce0704dec63be82440c8182.pdf#toolbar=0&view=FitV" class="view-floormap PC-only">フロアマップを見る</a> -->
        <!-- <a href="https://www.kansaigaidai.ac.jp/asp/img/pdf/82/7a79c35f7ce0704dec63be82440c8182.pdf#toolbar=1&view=FitV" class="view-floormap mobile-only">フロアマップを見る</a> -->
        <script>
          $('a.view-floormap').modaal(
          {
            type: 'iframe'
          });
        </script>
        <style>
          .modaal-container
          {
            height: 100%;
          }
        </style>
      </div>
    </header>

    <!-- Main Contents -->
    <div class="main-body">

      <div class="caption" id="_3">
        <div class="info">
          <h1>3年生</h1>
          <p>in 2-503 / 2-504</p>
        </div>
      </div>
      <div class="banners-container">
        <?php
        for ($__num = 1; $__num <= 11; $__num++)
        {
          include 'team-banner.php';
        }
        ?>
      </div>

      <div class="caption" id="_2">
        <div class="info">
          <h1>2年生</h1>
          <p>in 2-502 / 2-505</p>
        </div>
        <div class="sub-caption">
          <span>企業からご来場の方は<a href="https://sites.google.com/da.iwasaki.ac.jp/2a2024/ホーム" target="_blank">ゲーム科24卒ポートフォリオサイト</a>も是非ご覧ください。</span>
        </div>
      </div>
      <div class="banners-container">
        <?php
        for ($__num = 12; $__num <= 28; $__num++)
        {
          if ($__num != 24)
          {
            include 'team-banner.php';
          }
        }
        ?>
      </div>

      <div class="caption" id="_1">
        <div class="info">
          <h1>1年生</h1>
          <p>in 2-502</p>
        </div>
      </div>
      <span class="no-web">1年生のWEB展示はございません。会場で是非お楽しみください。</span>
      <style>
        span.no-web
        {
          color: #777;
          font-size: 18px;
          font-weight: bold;
        }
        @media (max-width: 480px)
        {
          span.no-web
          {
            font-size: 3.5vw;
          }
        }
      </style>

      <div class="caption" id="_e">
        <div class="info">
          <h1>e-sports</h1>
          <p>in 2-506</p>
        </div>
      </div>
      <div class="banners-container">
        <?php
        $__num = 24;
        include 'team-banner.php';
        ?>
      </div>
      
    </div>

    <!-- Footer -->
    <footer>
      <div class="copy-name">
        <i class="far fa-copyright"></i>&nbsp;&nbsp;2022<?php if (date("Y") >= 2023) echo '-2023'; ?>&nbsp;&nbsp;YDA Game&nbsp;&nbsp;/&nbsp;&nbsp;Shoichi Kawasaki
      </div>
    </footer>
  </div>

  <?php
  include 'access-counter.php';
  ?>
</body>

</html>