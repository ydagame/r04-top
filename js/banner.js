$(function()
{
  // $('.site-url').css('display', 'none');

  $('.banner-img-overlay').mouseover(function()
  {
    $(this).find('.site-url').css('width', ($(this).find('.site-url').find('span').width() + 24) + 'px');
  });
  $('.banner-img-overlay').mouseout(function()
  {
    $(this).find('.site-url').css('width', '0');
  });
});
$(function()
{
  $('.banner-container'         ).css('grid-template-columns', `repeat(${Math.ceil(window.innerWidth / 1920 * 4)}, 1fr)`);
  $('.banner-container.large'   ).css('grid-template-columns', `repeat(${Math.ceil(window.innerWidth / 1920 * 2)}, 1fr)`);
  $('.banner-container.large2'  ).css('grid-template-columns', `repeat(${Math.ceil(window.innerWidth / 1920 * 3)}, 1fr)`);
  $('.banner-container.festival').css('grid-template-columns', `repeat(5, 1fr)`);
  
  $(window).resize(function()
  {
    $('.banner-container'         ).css('grid-template-columns', `repeat(${Math.ceil(window.innerWidth / 1920 * 4)}, 1fr)`);
    $('.banner-container.large'   ).css('grid-template-columns', `repeat(${Math.ceil(window.innerWidth / 1920 * 2)}, 1fr)`);
    $('.banner-container.large2'  ).css('grid-template-columns', `repeat(${Math.ceil(window.innerWidth / 1920 * 3)}, 1fr)`);
    $('.banner-container.festival').css('grid-template-columns', `repeat(5, 1fr)`);
  });
});