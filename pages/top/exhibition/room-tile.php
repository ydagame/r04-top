<?php if (isset($tile_background) && isset($caption_id)): ?>

<?php
$guid = uniqid();
?>

<div class="tile id-<?php echo $guid; ?> <?php if (!$has_link) echo 'no-link'; ?>"
<?php if ($has_link): ?>
onclick="scroll_to_grade_caption(<?php echo '\''.$caption_id.'\''; ?>)"
<?php endif; ?>
>
  <div class="room-using">
    <?php echo $caption; ?>
  </div>
  <div class="room-name">
    <?php echo $room_str; ?>
  </div>
  <i class="fa-solid fa-angle-down"></i>
</div>
<script>
  <?php if (!is_array($tile_background)): ?>
  $(function()
  {
    $('div.tile.id-<?php echo $guid; ?>').css('background', 'url(<?php echo $tile_background; ?>)');
  });
  <?php else: ?>
  $(function()
  {
    let photos = [];
    let index = 0;

    <?php foreach ($tile_background as $photo):?>
    photos.push(<?php echo '"'.$photo.'"'; ?>);
    <?php endforeach; ?>
    
    $('div.tile.id-<?php echo $guid; ?>').css('background', `url(${photos[index]})`);
    $('div.tile.id-<?php echo $guid; ?>').css('transition-duration', '1s');

    setInterval(() =>
    {
      if (++index >= photos.length)
      {
        index = 0;
      }
      
      $('div.tile.id-<?php echo $guid; ?>').css('background', `url(${photos[index]})`);
    }, 4000);
  });
  <?php endif; ?>
</script>

<?php endif; ?>