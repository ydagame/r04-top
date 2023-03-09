$(function()
{
  /**
   * スクロールアイコン
   * On Clicked
   */
  $('div.scroll-anim').click(function()
  {
    let offset = parseInt($('.header-column').css('border-bottom-width').replaceAll('px', ''));
    let scroll = new SmoothScroll();
    scroll.animateScroll($(window).height() + offset);
  });

  let scrollY = $(window).scrollTop();

  $('i.move-to-top').css('opacity', scrollY >= $(window).height() + 128 ? 1 : 0);
  $('i.move-to-top').css('cursor',  scrollY >= $(window).height() + 128 ? 'pointer' : 'default');

  if (scrollY + $(window).height() >= $(document).height() - 80)
  {
    $('i.move-to-top').css('bottom', '110px');
  }
  else
  {
    $('i.move-to-top').css('bottom', '30px');
  }

  /**
   * スクロール位置によって表示切替
   */
  $(window).scroll(function()
  {
    let y = $(this).scrollTop();

    $('i.move-to-top').css('opacity', y >= $(window).height() + 128 ? 1 : 0);
    $('i.move-to-top').css('cursor',  y >= $(window).height() + 128 ? 'pointer' : 'default');

    if (y + $(window).height() >= $(document).height() - 80)
    {
      $('i.move-to-top').css('bottom', '110px');
    }
    else
    {
      $('i.move-to-top').css('bottom', '30px');
    }
  });

  /**
   * Move to Top
   * On Clicked
   */
  $('i.move-to-top').click(function()
  {
    window.scroll({ top: 0, behavior: 'smooth'});
  });

  /**
   * Get 100vh and Set
   */
  document.documentElement.style.setProperty('--vh', `clamp(650px, ${$(window).height()}px, 1080px)`);

  $(window).resize(function()
  {
    // Set 100vh at Resized
    document.documentElement.style.setProperty('--vh', `clamp(650px, ${$(window).height()}px, 1080px)`);

    // Disable Header trans duration
    $('header').addClass('disable-trans');

    // Re Enable Header trans duration
    setTimeout(() =>
    {
      $('header').removeClass('disable-trans');
    }, 1);
  });

  /**
   * Black href Clicked
   */
  $('a').click(function(e)
  {
    if ($(this).attr('href') == '')
    {
      e.preventDefault();
    }
  })
});
