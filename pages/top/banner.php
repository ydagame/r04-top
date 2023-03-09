<?php
list($num, $display_name, $project_name, $url, $banner_img,
     $platform_PC, $platform_mobile, $platform_VR, $platform_Arcade, $platform_esports, $platform_other) =
     isset($path) ? getData($__num, $path) : getData($__num);

$banner_img = 'https://ydagame.shopipi.app/banner/'.$banner_img;

$url_short = str_replace('https://', '', $url);
$url_short = str_replace('http://',  '', $url_short);
?>

<style>
  .banner-container.festival .banner-wrapper.id-<?php echo $num; ?>
  {
    background: <?php echo $__num <= 11 ? '#F24405' : '#F28705'; ?> !important;
  }
</style>

<div class="banner-wrapper id-<?php echo $num; ?>">
  <div class="banner-img-wrapper">
    <div class="banner-img"></div>
    <a class="banner-img-overlay" <?php if ($url != '') echo 'href="'.$url.'"'; ?> target="_blank">
      <span class="site-url"
        <?php
        if ($url == '')
        {
          echo 'style="color: red;"';
        }
        else
        {
          echo 'style="display: none;"';
        }
        ?>
      >
        <i class="fa-solid fa-arrow-up-right-from-square"></i>
        <span>
          <?php echo $url != '' ? $url_short : 'URL未登録'; ?>
        </span>
      </span>
      <span class="project-name">
        <?php echo $project_name; ?>
      </span>
    </a>
  </div>
  <div class="info-container">
    <span class="team-name">
      <?php echo $display_name.'　'; ?>
    </span>
    <div class="platform-icons">
      <i class="fa-solid e-sports" style="display: <?php echo ($platform_esports === 'true' ? 'inline' : 'none') ?>;"></i>
      <i class="fa-solid other"    style="display: <?php echo ($platform_other   === 'true' ? 'inline' : 'none') ?>;"></i>
      <i class="fa-solid VR"       style="display: <?php echo ($platform_VR      === 'true' ? 'inline' : 'none') ?>;"></i>
      <i class="fa-solid Arcade"   style="display: <?php echo ($platform_Arcade  === 'true' ? 'inline' : 'none') ?>;"></i>
      <i class="fa-solid PC"       style="display: <?php echo ($platform_PC      === 'true' ? 'inline' : 'none') ?>;"></i>
      <i class="fa-solid mobile"   style="display: <?php echo ($platform_mobile  === 'true' ? 'inline' : 'none') ?>;"></i>
    </div>
  </div>
</div>
<script>
  $(function()
  {
    $('.id-<?php echo $num; ?> .banner-img').css('background', 'url(<?php echo $banner_img; ?>)');
  });
</script>
