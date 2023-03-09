$(function()
{
  $('div.body-wrapper').css('visibility', 'visible');
});

function scroll_to_grade_caption(id)
{
  const $target = $('div.main-body > div.caption#' + id);
  
  let scroll = new SmoothScroll();
  scroll.animateScroll($target.offset().top, null, { speed: 720, speedAsDuration: true });
}