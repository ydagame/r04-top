<?php
// pathを現在のページに設定
if (isset($page)) $path = $page;
?>

<script>
/**
 * Photo URLs
 */
const photo_folder = 'datas/<?php echo $page; ?>/Photos/';

const PHOTO_URL =
[
  `${photo_folder}IMG_6182.jpg`,
  `${photo_folder}IMG_6184.jpg`,
  `${photo_folder}IMG_6185.jpg`,
  `${photo_folder}IMG_6187.jpg`,
  `${photo_folder}IMG_6188.jpg`,
  `${photo_folder}IMG_6189.jpg`,
  `${photo_folder}IMG_6190.jpg`,
  `${photo_folder}IMG_6191.jpg`,
  `${photo_folder}IMG_6210.jpg`,
  `${photo_folder}IMG_6211.jpg`,
  `${photo_folder}IMG_6212.jpg`,
];
</script>

<style>
/* Festival Color Theme */
:root
{
  --header-column-color: #D95204;
  --scrollbar-back: #F27405;
  --scrollbar-thumb: #D95204;
  --banner-caption-line: #F27405;
}
div.title
{
  font-size: 128px;
}
</style>

<?php
require 'data-manager.php';
?>

<?php
// if (!$_ALLOW_SHOW_FESTIVAL) goto _DEFAULT;
?>
<style>
  .fes-room-caption
  {
    margin: 170px auto 50px;
    padding: 10px 40px;
    text-align: center;
    /* border: solid 5px #5c722b; */
    width: fit-content;
    background: #7AC143;
    color: whitesmoke;
    font-size: 32px;
    line-height: 32px;
  }
  .room-path
  {
    height: 80px;
  }
  .room-board
  {
    width: 100%;
    height: 6px;
    background: #515151;
    border-radius: 3px;
    margin: 0 auto;
  }
  .desk
  {
    width: 80%;
    height: 50px;
    margin: 4px auto;
    background: lightgray;
    border: dashed 2px black;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    font-weight: bold;

    position: relative;
    z-index: 2;
  }
  .desk._3
  {
    background: gray;
    color: white;
  }
  .desk.large
  {
    height: 100px;
  }
  .mini-caption
  {
    width: 84px !important;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    font-weight: bold;

    padding: 5px;
  }
  .mini-caption.room-name
  {
    background: #DDDDDD;
    color: black;
    
    border: solid 4px #DDDDDD;
    border-bottom: none;
    margin: 10px auto 0;
    width: 100px !important;
    font-size: 18px;
  }
  .mini-caption.enter-exit
  {
    background: #7AC143;
    color: white;
    
    /* border: solid 4px darkgray; */
    border-top: none;
    border-radius: 0 0 10px 10px;
    margin-bottom: 10px;
    font-size: 16px;
  }
  .banner-container.web-only > .banner-wrapper.real-publish
  {
    display: none !important;
  }
  @media screen and (max-width: 480px)
  {
    .banner-container.web-only > .banner-wrapper.real-publish
    {
      display: flex !important;
    }
  }
</style>

<!-- for Festival Title -->
<style>
  @media screen and (max-width: 480px)
  {
    div.title
    {
      font-size: 22vw !important;
      line-height: 17vw !important;
    }
  }
</style>

<div class="fes-layout">

<!-- <h1 class="fes-room-caption">学科展示スペース<br>会場レイアウト<br><span style="font-size: 16px; text-align: right;">(編集中...)</span></h1> -->

<div class="room-caption PC-only">
  <p>学科展示 会場レイアウト</p>
  <p>（2号館-803教室）</p>
  <!-- <p style="font-size: 16px;">編集中...</p> -->
</div>

<?php
/**
 * リアル展示をする番号
 */
$real_publish_nums = [];
?>

<div class="banner-container festival class-room"
  style="
  border: solid 6px #7AC143;
  margin: 0 auto;
  padding: 10px 60px 60px;
  "
  >
  <!-- <div class="room-board"></div> -->
  <!-- <div class="room-board"></div> -->
  <!-- <div class="room-board"></div> -->
  <!-- <div class="room-board"></div> -->
  <!-- <div class="room-board"></div> -->
  <div class="desk _3"><?php echo getData( 1)[1]; ?></div>
  <div class="desk _3"><?php echo getData( 3)[1]; ?></div>
  <div class="desk _3"><?php echo getData( 4)[1]; ?></div>
  <div class="desk _3"><?php echo getData( 5)[1]; ?></div>
  <div class="desk"><?php echo getData(21)[1]; ?></div>
  
  <div class="room-path"></div>
  <div class="room-path"></div>
  <div class="room-path"></div>
  <div class="room-path"></div>
  <div class="room-path"></div>

  <div class="desk"><?php echo getData(12)[1]; ?></div>
  <div class="desk"><?php echo getData(19)[1]; ?></div>
  <div class="desk"><?php echo getData(14)[1]; ?></div>
  <div class="desk"><?php echo getData(25)[1]; ?></div>
  <div class="desk"><?php echo getData(22)[1]; ?></div>

  <!-- <div class="room-board"></div> -->
  <!-- <div class="room-board"></div> -->
  <!-- <div class="room-board"></div> -->
  <!-- <div class="room-board"></div> -->
  <!-- <div class="room-board"></div> -->

  <div class="desk"><?php echo getData(15)[1]; ?></div>
  <div class="desk"><?php echo getData(23)[1]; ?></div>
  <div class="desk"><?php echo getData(17)[1]; ?></div>
  <div class="desk"><?php echo getData(20)[1]; ?></div>
  <div class="desk"><?php echo getData(18)[1]; ?></div>
</div>
<div style="width: calc(90% + 60px * 2 + 6px * 2); max-width: calc(1640px + 60px * 2 + 6px * 2); margin: 0 auto; display: flex; flex-direction: row;" class="PC-only">
  <div style="text-align: left;" class="enter-exit mini-caption">出口</div>
  <div style="width: 100%;"></div>
  <div style="text-align: right;" class="enter-exit mini-caption">入口</div>
</div>

<div class="banner-container festival">
  <?php
  $__num =  1; include 'banner.php'; array_push($real_publish_nums, $__num);
  $__num =  3; include 'banner.php'; array_push($real_publish_nums, $__num);
  $__num =  4; include 'banner.php'; array_push($real_publish_nums, $__num);
  $__num =  5; include 'banner.php'; array_push($real_publish_nums, $__num);
  $__num = 21; include 'banner.php'; array_push($real_publish_nums, $__num);
  ?>
</div>
<div class="banner-container festival">
  <?php
  $__num = 12; include 'banner.php'; array_push($real_publish_nums, $__num);
  $__num = 19; include 'banner.php'; array_push($real_publish_nums, $__num);
  $__num = 14; include 'banner.php'; array_push($real_publish_nums, $__num);
  $__num = 25; include 'banner.php'; array_push($real_publish_nums, $__num);
  $__num = 22; include 'banner.php'; array_push($real_publish_nums, $__num);
  ?>
</div>
<div class="banner-container festival">
  <?php
  $__num = 15; include 'banner.php'; array_push($real_publish_nums, $__num);
  $__num = 23; include 'banner.php'; array_push($real_publish_nums, $__num);
  $__num = 17; include 'banner.php'; array_push($real_publish_nums, $__num);
  $__num = 20; include 'banner.php'; array_push($real_publish_nums, $__num);
  $__num = 18; include 'banner.php'; array_push($real_publish_nums, $__num);
  ?>
</div>

<?php
foreach ($real_publish_nums as $value)
{
  echo '<script>$(function(){$(".banner-wrapper.id-'.$value.'").addClass("real-publish");});</script>';
}
?>

</div> <!-- END OF: fes-layout -->

<?php
if (!$_ALLOW_SHOW_FESTIVAL) goto _DEFAULT;
?>

<?php
_DEFAULT:
?>

<!-- Mobile View -->
<div class="room-caption mobile">
  <p>学科展示 会場レイアウト</p>
  <p>（2号館-803教室）</p>
</div>
<div class="banner-container festival class-room dev mobile"
  style="
  border: solid 6px #7AC143;
  margin: 0 auto;
  padding: 10px 60px 40px;
  "
  >
  <div class="desk z _3">1</div>
  <div class="desk z _3">2</div>
  <div class="desk z _3">3</div>
  <div class="desk z _3">4</div>
  <div class="desk z">5</div>

  <div class="desk">6</div>
  <div class="desk">7</div>
  <div class="desk">8</div>
  <div class="desk">9</div>
  <div class="desk">10</div>

  <div class="desk">11</div>
  <div class="desk">12</div>
  <div class="desk">13</div>
  <div class="desk">14</div>
  <div class="desk">15</div>
</div>

<div style="width: 90%; margin: 0 auto; display: none; flex-direction: row;" class="enter-exit-container">
  <div style="text-align: left;" class="enter-exit mini-caption">出口</div>
  <div style="width: 100%;"></div>
  <div style="text-align: right;" class="enter-exit mini-caption">入口</div>
</div>

<div style="display: flex; flex-direction: row; margin: 0 auto; width: 95%; align-items: center; justify-content: center; display: none;" class="mobile-team-names-container">
  <div class="mobile-team-names">
    <p>1. <?php echo getData( 1)[1]; ?></p>
    <p>2. <?php echo getData( 3)[1]; ?></p>
    <p>3. <?php echo getData( 4)[1]; ?></p>
    <p>4. <?php echo getData( 5)[1]; ?></p>
    <p>5. <?php echo getData(21)[1]; ?></p>
  </div>
  <div class="mobile-team-names-sep"></div>
  <div class="mobile-team-names">
    <p>6. <?php echo getData(12)[1]; ?></p>
    <p>7. <?php echo getData(19)[1]; ?></p>
    <p>8. <?php echo getData(14)[1]; ?></p>
    <p>9. <?php echo getData(25)[1]; ?></p>
    <p>10. <?php echo getData(22)[1]; ?></p>
  </div>
  <div class="mobile-team-names-sep"></div>
  <div class="mobile-team-names">
    <p>11. <?php echo getData(15)[1]; ?></p>
    <p>12. <?php echo getData(23)[1]; ?></p>
    <p>13. <?php echo getData(17)[1]; ?></p>
    <p>14. <?php echo getData(20)[1]; ?></p>
    <p>15. <?php echo getData(18)[1]; ?></p>
  </div>
</div>

<style>
  .room-caption
  {
    text-align: center;
    font-size: 32px;
    line-height: 0px;
    font-weight: bold;

    width: fit-content;
    margin: 180px auto 50px;

    border-top: solid 6px #1DB6F2;
    border-bottom: solid 6px #1DB6F2;
    padding: 0 20px;
    background: #F23D3D;
    color: white;
  }
  .room-caption.mobile
  {
    display: none;
  }
  .room-caption.mobile > p
  {
    font-size: 24px;
  }

  .banner-container.festival
  {
    width: 90%;
    max-width: 1640px;
  }
  .banner-container.festival.class-room.dev
  {
    width: 80% !important;
  }
  .banner-container.festival.class-room.dev.mobile
  {
    display: none;
  }
  .desk
  {
    width: 80%;
    height: 50px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
  .desk.z
  {
    margin-bottom: 6vw;
  }
  .room-path
  {
    height: 100px;
  }
  @media screen and (max-width: 480px)
  {
    .room-caption
    {
      margin: 260px auto 4vw;
      padding: 1vw 5vw;
      width: 70%;
    }
    .room-caption.mobile
    {
      display: block;
    }
    .banner-container.festival
    {
      display: none;
    }
    .banner-container.festival.class-room.dev
    {
      padding: 0 4vw 2vw !important;
      width: 80vw !important;
      border-width: 0.75vw !important;
    }
    .mini-caption.room-name
    {
      font-size: 3vw;
    }
    .banner-container.festival.class-room.dev .desk
    {
      font-size: 2.5vw !important;
      width: 50%;
      height: 3.5vw !important;
      border-width: 0.5vw !important;
      border-color: orangered;
      border-radius: 0;
      background: #F28705;
      /* background: #F24405; */
      color: white;
    }
    .banner-container.festival.class-room.dev .desk._3
    {
      background: #F24405;
    }
    .enter-exit-container
    {
      display: flex !important;
      width: 89.4vw !important;
    }
    .enter-exit.mini-caption
    {
      font-size: 2.5vw;
      border-radius: 0 0 1vw 1vw;
      padding: 0;
      width: 10vw !important;
    }
    .banner-container.festival.class-room.dev.mobile
    {
      display: grid;
    }
    .banner-container.festival.class-room.dev.PC
    {
      display: none;
    }
    .PC-only
    {
      display: none !important;
    }
  }

  .mobile-team-names
  {
    display: none;
    margin: 0 auto;
    width: fit-content;
    font-size: 2vw;
    line-height: 1vw;
  }
  .mobile-team-names-sep
  {
    width: 1px;
    height: 16vw;
    background: darkgray;
  }
  @media screen and (max-width: 480px)
  {
    .mobile-team-names-container
    {
      display: flex !important;
    }
    .mobile-team-names
    {
      display: block;
    }
  }
</style>

<div class="room-caption PC-only" style="margin-bottom: -100px;">
  <p>オンラインのみ展示</p>
</div>

<?php
$grade = '2年生';
include 'banner-caption.php'
?>

<div class="banner-container web-only">
  <?php
  for ($__num = 12; $__num <= 23; $__num++)
  {
    include 'banner.php';
  }
  ?>
</div>

<?php
$grade = '3年生';
include 'banner-caption.php'
?>

<div class="banner-container web-only">
  <?php
  for ($__num = 1; $__num <= 11; $__num++)
  {
      include 'banner.php';
  }
  ?>
</div>

<?php
$grade = '2・3年生合同';
$__num = 24;
include 'banner-caption.php'
?>

<div class="banner-container large web-only">
  <?php
  include 'banner.php';
  ?>
</div>
