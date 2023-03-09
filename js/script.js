/**
 * バックグラウンドで画像を読み込み
 * @param { string } url 
 */
function BackgroundLoadImgResource(url)
{
  import('https://code.jquery.com/jquery-3.5.1.min.js').then(() =>
  {
    $("<img>", { src: url, width: 0, height: 0 })
      .appendTo("body")
      .css('position', 'fixed');
  });
}
