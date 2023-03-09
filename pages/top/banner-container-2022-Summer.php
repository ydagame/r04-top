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
  `${photo_folder}IMG_5695_FHD.jpg`,
  `${photo_folder}IMG_5696_FHD.jpg`,
  `${photo_folder}IMG_5700_FHD.jpg`,
  `${photo_folder}IMG_5701_FHD.jpg`,
  `${photo_folder}IMG_5702_FHD.jpg`,
  `${photo_folder}IMG_5703_FHD.jpg`,
  `${photo_folder}IMG_5705_FHD.jpg`,
  `${photo_folder}IMG_5706_FHD.jpg`,
  `${photo_folder}IMG_5708_FHD.jpg`
];
</script>

<style>
/* Summer Color Theme */
:root
{
  --header-column-color: #07C4D9;
  --scrollbar-back: #BBDDF2;
  --scrollbar-thumb: #07C4D9;
  --banner-caption-line: dodgerblue;
}
</style>

<?php
require 'data-manager.php';
?>

<?php
$grade = '3年生';
include 'banner-caption.php'
?>

<div class="banner-container">
  <?php
  for ($__num = 1; $__num <= 11; $__num++)
  {
    include 'banner.php';
  }
  ?>
</div>

<?php
$grade = '2年生';
include 'banner-caption.php'
?>

<div class="banner-container">
  <?php
  for ($__num = 12; $__num <= 23; $__num++)
  {
    if ($__num != 22)
      include 'banner.php';
  }
  ?>
</div>

<?php
$grade = '2・3年生合同';
$__num = 24;
include 'banner-caption.php'
?>

<div class="banner-container large">
  <?php
  include 'banner.php';
  ?>
</div>
