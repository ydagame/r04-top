$(function()
{
  /**
   * すべての画像を事前読み込み
   */
  for (let url of PHOTO_URL)
  {
    BackgroundLoadImgResource(url);
  }

  /**
   * ランダム
   */
  let i = getRandomInt(0, PHOTO_URL.length - 1);

  /**
   * ランダムな方向
   */
  let dir = getRandomInt(0, 1) ? -1 : 1;

  /**
   * 最初の変更
   */
  $('header.photo-slide').css('background', `url(${PHOTO_URL[i]})`);

  /**
   * 3秒ごとに変更
   */
  setInterval(() =>
  {
    /**
     * 次の画像
     */
    i += dir;

    /**
     * リピート
     */
    if (i < 0)                    i = PHOTO_URL.length - 1;
    if (i > PHOTO_URL.length - 1) i = 0;

    /**
     * 画像変更
     */
    $('header.photo-slide').css('background', `url(${PHOTO_URL[i]})`);
  }, 3000);
});

/**
 * Get Random Int
 * @param { number } min Min Value
 * @param { number } max Max Value
 * @returns Random Int
 */
function getRandomInt(min, max)
{
  return Math.floor(Math.random() * (max - min + 1) + min);
}
