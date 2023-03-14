<?php
require 'data-manager.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録情報チェック</title>
</head>

<style>
table
{
  border-collapse: collapse;
  width: 100%;
}
th, td
{
  border: solid 2px darkgray;
  padding: 10px 20px;
}
tr.error
{
  background: red;
  color: white;
}
tr.warn
{
  background: yellow;
  color: black;
}
</style>

<body>
  <table>
    <tr>
      <th>ID</th>
      <th>チーム名</th>
      <th>プロジェクト名</th>
      <th>URL</th>
      <th>バナー</th>
    </tr>
    <tr>
      <?php
      function expand_url($url)
      {
        $ch = curl_init( $url );
        curl_setopt_array($ch,
        [
          CURLOPT_HEADER => 1,
          CURLOPT_NOBODY => 1,
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_SSL_VERIFYPEER => 0
        ]);
        $resp = curl_exec($ch);
       
        if (preg_match('/Location: (.*)/i', $resp, $matches))
        {
          return expand_url($matches[1]);
        }
       
        return trim($url);
      }
      
      function print_tr($__num)
      {
        list($num, $display_name, $project_name, $url, $banner_img,
             $platform_PC, $platform_mobile, $platform_VR, $platform_Arcade, $platform_esports, $platform_other) =
             getData($__num);

        $ex_url = expand_url($url);
        $warn = (strpos($ex_url, 'accounts.google.com') !== false);
        $error = ($project_name == 'プロジェクト名を入力' || $url == '' || $banner_img == 'example.png');

        echo
        '
        <tr class="'.($error ? 'error' : '').' '.($warn ? 'warn' : '').'">
          <td>'.$num.'</td>
          <td>'.$display_name.'</td>
          <td>'.$project_name.'</td>
          <td>
            <a href="'.$url.'" target="_blank">'.explode('?', $ex_url)[0].'</a>
          </td>
          <td>
            <img src="https://ydagame.shopipi.app/banner/'.$banner_img.'" width="200">
          </td>
        </tr>';
      }
      ?>
      <?php
      for ($i = 1; $i <= 28; $i++)
      {
        print_tr($i);
      }
      ?>
    </tr>
  </table>
</body>

</html>