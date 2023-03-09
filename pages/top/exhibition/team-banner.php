<?php
$data = isset($datas) ? $datas[$__num] : $data;
list($num, $display_name, $project_name, $url, $banner_img,
     $platform_PC, $platform_mobile, $platform_VR, $platform_Arcade, $platform_esports, $platform_other)
     = $data;

$banner_img = 'https://ydagame.shopipi.app/banner/'.$data[4];
?>

<a href="<?php echo $url; ?>" target="_blank" class="banner-wrapper id-<?php echo $num; ?>">
  <div class="banner-img"></div>
  <div class="platform-icons">
    <i class="fa-solid e-sports" style="display: <?php echo ($platform_esports === 'true' ? 'flex' : 'none') ?>;"><div class="tooltip">e-sports</div></i>
    <i class="fa-solid other"    style="display: <?php echo ($platform_other   === 'true' ? 'flex' : 'none') ?>;"><div class="tooltip">IT・その他</div></i>
    <i class="fa-solid VR"       style="display: <?php echo ($platform_VR      === 'true' ? 'flex' : 'none') ?>;"><div class="tooltip">VRゲーム</div></i>
    <i class="fa-solid Arcade"   style="display: <?php echo ($platform_Arcade  === 'true' ? 'flex' : 'none') ?>;"><div class="tooltip">アーケードゲーム</div></i>
    <i class="fa-solid PC"       style="display: <?php echo ($platform_PC      === 'true' ? 'flex' : 'none') ?>;"><div class="tooltip">PCゲーム</div></i>
    <i class="fa-solid mobile"   style="display: <?php echo ($platform_mobile  === 'true' ? 'flex' : 'none') ?>;"><div class="tooltip">モバイルゲーム</div></i>
  </div>
  <div class="team-name">
    <?php echo $display_name; ?>
  </div>
  <div class="project-name">
    <?php echo $project_name; ?>
  </div>
</a>
<script>
  $(function()
  {
    $('a.banner-wrapper.id-<?php echo $num; ?> > div.banner-img').css('background', 'url(<?php echo $banner_img; ?>)');
  });
</script>