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
          function print_room_tile($caption_id, $caption, $room_str, $tile_background)
          {
            include 'room-tile.php';
          }
          print_room_tile('_3', '3年生', 'in 2-503 / 2-504', 'datas/2023-Exhibition/Photos/IMG_6212.jpg');
          print_room_tile('_2', '2年生', 'in 2-50* / 2-50*', 'datas/2023-Exhibition/Photos/IMG_6211.jpg');
          print_room_tile('_1', '1年生・有志', 'in 2-50*', 'datas/2023-Exhibition/Photos/IMG_6210.jpg');
          print_room_tile('_e', 'e-sports', 'in 2-50*', 'datas/2023-Exhibition/Photos/IMG_6185.jpg');
          ?>
        </div>
        <a href="https://www.kansaigaidai.ac.jp/asp/img/pdf/82/7a79c35f7ce0704dec63be82440c8182.pdf#toolbar=0&view=FitV" class="view-floormap pdf">フロアマップを見る</a>
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
        <h1>3年生</h1>
        <p>in 2-503 / 2-504</p>
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
        <h1>2年生</h1>
        <p>in 2-50* / 2-50*</p>
      </div>
      <div class="banners-container">
        <?php
        for ($__num = 12; $__num <= 23; $__num++)
        {
          include 'team-banner.php';
        }
        ?>
      </div>

      <div class="caption" id="_1">
        <h1>1年生・有志</h1>
        <p>in 2-50*</p>
      </div>

      <div class="caption" id="_e">
        <h1>e-sports</h1>
        <p>in 2-50*</p>
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