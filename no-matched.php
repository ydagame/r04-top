<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="author"   content="shopipi">
  <meta name="robots"   content="noindex,nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php set_theme_color_for_PC('#FFFFFF'); ?>
  
  <link rel="shortcut icon" href="https://prtimes.jp/data/corp/44572/tmp-44ba30a823952f0d524d1404048a0a84-ca5da1382c5ed7bc77275ebc7f48daad.jpg">

  <meta property="og:title"       content="見つかりませんでした">
  <meta property="og:site_name"   content="YDAゲーム科トップページ 2022-2023">
  <meta property="og:type"        content="website">
  <meta property="og:image"       content="https://pbs.twimg.com/profile_images/1415936999953821697/TOw3awWd_400x400.jpg">
  <meta property="og:description" content="横浜デジタルアーツ専門学校のゲーム科の発表会用トップページです">
  <meta name="twitter:card"       content="summary">
  <meta name="twitter:title"      content="見つかりませんでした | YDAゲーム科トップページ 2022-2023">
  <meta name="description"        content="横浜デジタルアーツ専門学校のゲーム科の発表会用トップページです">
  <title>見つかりませんでした | YDAゲーム科トップページ 2022-2023</title>
</head>

<body>
  <style>
    *
    {
      font-family: Arial, Helvetica, sans-serif;
      font-weight: bold;
    }
    body
    {
      margin: 0 !important;
      padding: 0 !important;
      background: #F4F5F7;
    }
    .wrapper
    {
      margin: 0 auto;
      margin-top: 25vh;
      width: fit-content;
      height: fit-content;
      display: flex;
      flex-direction: column;
    }
    h2
    {
      font-size: 28px;
      color: gray;
      border-bottom: solid 3px gray;
    }
    h3
    {
      text-align: center;
      color: salmon;
    }
    span.at
    {
      color: salmon;
      font-size: 38px;
    }
    li, a
    {
      font-size: 22px;
      color: seagreen;
    }
  </style>
  <div class="wrapper">
    <h2>
      <span class="at">"<?php echo $page; ?>"</span>のページを見つけることが出来ませんでした
    </h2>
    <h3>現在公開されているトップページ</h3>
    <ul>
      <?php
      foreach ($page_names as $page_name)
      {
        echo
        '<li>
          <a href="@'.$page_name.'">'.$page_name.'</a>
        </li>';
      }
      ?>
    </ul>
  </div>
</body>

</html>
