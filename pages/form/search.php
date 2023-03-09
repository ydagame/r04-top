<?php date_default_timezone_set('Asia/Tokyo');?>
<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  
  <?php
  require '../../functions.php';
  LoadItemWithNoCache('../top.css');
  LoadItemWithNoCache('../../css/style.css');
  LoadItemWithNoCache('../loading.css');
  LoadItemWithNoCache('../loading.js');
  require '../../data-manager.php';
  ?>
</head>

<body onload="loaded()">

  <!-- <?php include('../loading.php'); ?> -->

  <div class="p-wrapper">
    <div class="wrapper" style="width: fit-content;">
      <div class="title">
        <h3>1. チーム番号を選択して読み込み</h3>
      </div>
      <form action="edit" method="POST" autocomplete="off">
        <h4>
          <a href="https://docs.google.com/spreadsheets/d/1tXncfjSTTnqivpEfeT0cBL1lnwWNJU2MRN5AJnEpz8k/edit#gid=0" target="_blank">スプレッドシート</a>
          の番号を選択してください
        </h4>
        <div class="input">
          <select name="num" id="id" class="num">
            <?php
            for ($i = 1; $i <= MAX_NUM; $i++)
            {
              echo '<option value="'.$i.'"'.($i == $_COOKIE['__NUM'] ? ' selected' : '').'>'. ($i < 10 ? '&nbsp;' : '').$i.'</option>';
            }
            ?>
          </select>
          <input type="submit" value="検索" class="submit">
        </div>
      </form>
    </div>
  </div>
  
</body>

</html>
