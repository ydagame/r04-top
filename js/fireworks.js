$(function()
{
  $('div.fireworks').fireworks();

  $(window).scroll(function()
  {
    if (window.scrollY > $(window).height())
    {
      $('div.fireworks').css('top', `${window.scrollY}px`);
    }
  });
  
  document.addEventListener('visibilitychange', function()
  {
    if (document.hidden)
    {
      context.fillStyle = 'white';
      context.fillRect(0, 0, $(window).width(), $(window).height());
    }
  });
});
